<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concert;
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
    public function newConcertAction(Request $request, $festival_id){

        $em = $this->getDoctrine()->getManager();
        $festival = $em->getRepository('AppBundle:Festival')->findOneById($festival_id);

        $concert = new Concert();

        $form = $this->createForm('AppBundle\Form\ConcertType', $concert, ['type' => 'new']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $concert->setFestival($festival);

            // date and time pickers merging
            if (!empty($concert->getStart())) {
                $timestart = new \DateTime($concert->getStart()->format('Y-m-d') . ' ' . date("H:i", strtotime($_REQUEST['appbundle_concert']['timestart'])) . ":00");
                $concert->setStart($timestart);
            }
            if (!empty($concert->getEnd())) {
                $timeend = new \DateTime($concert->getEnd()->format('Y-m-d') . ' ' . date("H:i", strtotime($_REQUEST['appbundle_concert']['timeend'])) . ":00");
                $concert->setEnd($timeend);
            }



            $em->persist($concert);

            $em->flush();

            return $this->redirectToRoute('festival_edit', array('festival_id' => $concert->getFestival()->getId()));
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
        // get festival infos in render
        $em = $this->getDoctrine()->getManager();
        $festival = $em->getRepository('AppBundle:Festival')->findOneById($festival_id);

        // if concert already got a clone
        $hasClone = $em->getRepository('AppBundle:Concert')->findOneByConcert($concert);
        $error = ['clone'];
        if ($hasClone){
            return $this->render('concert/index.html.twig', array(
                'error' => $error
            ));
        }

        // set form with clone
        $concertClone = clone $concert;

        $editForm = $this->createForm('AppBundle\Form\ConcertType', $concertClone, ['type' => 'edit']);
        $editForm->handleRequest($request);

        // time fields not mapped in database
        $concertClone_data = $request->request->get('appbundle_concert');
        $concertClone_timestart = $concertClone_data['timestart'];
        $concertClone_timeend = $concertClone_data['timeend'];

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $concertClone->setConcert($concert);
            $concertClone->setTitle($concertClone->getArtist()->getName() . " @ " . $concertClone->getFestival()->getTitle());

            // date and timepickers merging
            if (!empty($concertClone->getStart())){
                $concertClone->setStart(new \DateTime($concertClone->getStart()->format('Y-m-d') .' ' . date("H:i", strtotime($concertClone_timestart)) . ":00"));
            }
            if (!empty($concertClone->getEnd())){
                $concertClone->setEnd(new \DateTime($concertClone->getEnd()->format('Y-m-d') .' ' . date("H:i", strtotime($concertClone_timeend)) . ":00"));
            }

            $em->persist($concertClone);
            $em->flush();

            return $this->redirectToRoute('concert_edit', array('concert_id' => $concert->getId(), 'festival_id' => $concert->getFestival()->getId()));
        }

        return $this->render('concert/index.html.twig', array(
            'concert' => $concert,
            'festival' => $festival,
            'form' => $editForm->createView(),
        ));
    }
}
