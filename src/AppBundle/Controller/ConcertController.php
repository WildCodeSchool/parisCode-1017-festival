<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concert;
use AppBundle\Entity\Festival;
use AppBundle\Services\GoogleMaps;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Festival controller.
 *
 * @Route("festival")
 */
class ConcertController extends Controller
{
    /**
     * Page: Create a concert.
     *
     * @Route("/{festival_id}/concert/new", name="concert_new", requirements={"festival_id": "\d+"}))
     * @Method({"GET", "POST"})
     * @ParamConverter("festival",   options={"mapping": {"festival_id": "id"}})
     * @ParamConverter("concert")
     */
    public function newConcertAction(Request $request, GoogleMaps $formattedaddress, $festival_id)
    {
        // TODO : ID propal / deuxieme table ???

        $em = $this->getDoctrine()->getManager();
        $festival = $em->getRepository('AppBundle:Festival')->findOneById($festival_id);

        $concert = new Concert();
        $form = $this->createForm('AppBundle\Form\ConcertType', $concert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if ($concert->getLocation()){
                $location = $formattedaddress->regularGeocoding($concert->getLocation());

                $concert->getLocation()->setLatitude($location['lat']);
                $concert->getLocation()->setLongitude($location['lng']);
                $concert->getLocation()->setName($location['place_id']);
            }

            $em->persist($concert);
            $em->flush();

            return $this->redirectToRoute('festival_edit', array('id' => $concert->getId(), 'festival_id' => $concert->getFestival()->getId()));
        }

        return $this->render('concert/index.html.twig', array(
            'festival' => $festival,
            'concert' => $concert,
            'form' => $form->createView(),
        ));
    }

    /**
     * Page: Edit a concert.
     *
     * @Route("/{festival_id}/concert/{concert_id}/edit", name="concert_edit", requirements={"festival_id": "\d+"}))
     * @ParamConverter("festival",   options={"mapping": {"festival_id": "id"}})
     * @ParamConverter("concert",   options={"mapping": {"concert_id": "id"}})
     * @Method({"GET", "POST"})
     */
    public function editConcertAction(Request $request, Concert $concert, $festival_id)
    {
        $editForm = $this->createForm('AppBundle\Form\ConcertType', $concert);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('festival_edit', array('festival_id' => $concert->getFestival()->getId()));
        }

        return $this->render('concert/index.html.twig', array(
            'concert' => $concert,
            'edit_form' => $editForm->createView(),
        ));
    }

}
