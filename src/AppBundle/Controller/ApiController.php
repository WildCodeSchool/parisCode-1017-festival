<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concert;
use AppBundle\Entity\Festival;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class ApiController
 * @package AppBundle\Controller
 *
 * @Route("api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/calendar", name="api_calendar")
     */
    public function getJsonEventAction(){
        $em = $this->getDoctrine()->getManager();
        $festivals = $em->getRepository(Festival::class)->findAll();
        $concerts = $em->getRepository(Concert::class)->findAll();
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

        // TODO Amandine : ajouter concerts
    }


}