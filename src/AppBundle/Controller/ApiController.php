<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Festival;
use AppBundle\Entity\Wishlist;
use AppBundle\Services\GoogleMaps;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpKernel\Exception\HttpException;


/**
 * Class ApiController
 * @package AppBundle\Controller
 *
 * @Route("api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/calendar/", name="api_calendar")
     */
    public function getJsonEventAction()
    {
        $em = $this->getDoctrine()->getManager();
        $wishlists = $em->getRepository(Wishlist::class)->findOneByUser($this->getUser());
        $festivals = $wishlists->getFestival();
        $concerts = $wishlists->getConcert();

        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();
        $callback = function ($datetime) {
            return $datetime instanceof \DateTime
                ? $datetime->format(\DateTime::ISO8601)
                : '';
        };
        $normalizer->setCallbacks(array(
            'start' => $callback,
            'end' =>$callback
        ));
        $normalizer->setCircularReferenceHandler(function ($object){
            return $object->getId();
        });
        $serializer = new Serializer(array($normalizer), array($encoder));
        $jsonFestivals = $serializer->serialize($festivals, 'json');
        $jsonConcerts = $serializer->serialize($concerts, 'json');
        $json = json_encode(array_merge(json_decode($jsonFestivals, true), json_decode($jsonConcerts, true)));
        return new Response($json);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \HttpException
     *
     * @Route("/resultSearch", name="search_bar")
     *
     * @Method("POST")
     */
    public function searchAction(Request $request){
        if ($request->isXmlHttpRequest()){
            $search = $request->get('search');

            $search = preg_replace('/^([^,]*).*$/', '$1', $search);

            $em = $this->getDoctrine()->getManager();
            $results = $em->getRepository(Festival::class)->searchBy($search);

            $locations = array();
            foreach ($results as $festival){
                $locations[] = [
                    "lat" => $festival->getLocation()->getLatitude(),
                    "lng" => $festival->getLocation()->getLongitude(),
                    "info" => "<a class='modal-trigger' href='#modal" . $festival->getId() . "b'>" . $festival->getTitle() . "</a>"
                    ];
            }

            if ($results == null){
                $template = "<p>No festivals found.</p>";
            } else {
                $template = $this->renderView('default/includes/festivalCard.html.twig', array(
                    'festivals' => $results,
                    'user' => $this->getUser()
                ));
            }

            return new JsonResponse(array("festivals" => $template, "locations" => $locations));

        } else {
            throw new HttpException('not an ajax request', 500);
        }
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \AppBundle\Services\GoogleMaps            $googleMaps
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Route("/autocompleteResult", name="autocomplete_home")
     *
     * @Method("GET")
     */
    public function autoCompleteAction(Request $request, GoogleMaps $googleMaps){

            $em = $this->getDoctrine()->getManager();
            $term = $request->get('term');

            $results = $em->getRepository(Festival::class)->autocompleteByTerm($term);

            $func = function ($val){
                return $val[key($val)];
            };

            $results = array_map($func, $results);

            return new JsonResponse(array_merge($results));


    }

}