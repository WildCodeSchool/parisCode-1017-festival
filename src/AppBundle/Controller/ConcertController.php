<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concert;
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
    public function newConcertAction(Request $request, GoogleMaps $formattedaddress, $festival_id){

        $em = $this->getDoctrine()->getManager();
        $festival = $em->getRepository('AppBundle:Festival')->findOneById($festival_id);

        $concert = new Concert();

        $form = $this->createForm('AppBundle\Form\ConcertType', $concert, ['type' => 'new']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // date and time pickers merging
            $timestart = new \DateTime($concert->getStart()->format('Y-m-d') .' ' . date("H:i", strtotime($_REQUEST['appbundle_concert']['timestart'])) . ":00");
            $timeend = new \DateTime($concert->getEnd()->format('Y-m-d') .' ' . date("H:i", strtotime($_REQUEST['appbundle_concert']['timeend'])) . ":00");
            $concert->setStart($timestart);
            $concert->setEnd($timeend);

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
        // NOT WORKING

        $concertEdit = clone $concert;

        $em = $this->getDoctrine()->getManager();
        $festival = $em->getRepository('AppBundle:Festival')->findOneById($festival_id);

        $editForm = $this->createForm('AppBundle\Form\ConcertType', $concertEdit, ['type' => 'edit']);

        $concertEdit->setConcert($concert);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            // date and time pickers merging
            $timestart = new \DateTime($concertEdit->getStart()->format('Y-m-d') .' ' . date("H:i", strtotime($_REQUEST['appbundle_concert']['timestart'])) . ":00");
            $timeend = new \DateTime($concertEdit->getEnd()->format('Y-m-d') .' ' . date("H:i", strtotime($_REQUEST['appbundle_concert']['timeend'])) . ":00");
            $concert->setStart($timestart);
            $concert->setEnd($timeend);

            $em->persist($concertEdit);
            $em->flush();

            return $this->redirectToRoute('festival_edit', array('festival_id' => $concert->getFestival()->getId()));
        }

        return $this->render('concert/index.html.twig', array(
            'concert' => $concert,
            'form' => $editForm->createView(),
        ));
    }

}
