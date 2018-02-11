<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Festival;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Festival controller.
 *
 * @Route("festival")
 */
class FestivalController extends Controller
{
    /**
     * Page: Create a new festival.
     *
     * @Route("/new", name="festival_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $festival = new Festival();

        $form = $this->createForm('AppBundle\Form\FestivalType', $festival, ['type' => 'new']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($festival);
            $em->flush();

            return $this->redirectToRoute('festival_edit', array('festival_id' => $festival->getId()));
        }

        return $this->render('festival/index.html.twig', array(
            'festival' => $festival,
            'form' => $form->createView(),
        ));
    }

    /**
     * Page: Edit a festival.
     *
     * @Route("/{festival_id}/edit", name="festival_edit", requirements={"festival_id": "\d+"}))
     * @ParamConverter("festival",   options={"mapping": {"festival_id": "id"}})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Festival $festival)
    {
        // get concerts infos in render
        $em = $this->getDoctrine()->getManager();
        $concerts = $em->getRepository('AppBundle:Concert')->findBy(array('festival' => $festival->getId()));

        // if festival already got a clone
        $hasClone = $em->getRepository('AppBundle:Festival')->findOneByFestival($festival);
        $error = ['clone'];
        if ($hasClone){
            return $this->render('festival/index.html.twig', array(
                'error' => $error
            ));
        }

        // set form with clone
        $festivalEdit = clone $festival;

        $editForm = $this->createForm('AppBundle\Form\FestivalType', $festivalEdit, ['type' => 'edit']);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $festivalEdit->setFestival($festival);

            $em->persist($festivalEdit);
            $em->flush();

            return $this->redirectToRoute('festival_edit', array('festival_id' => $festival->getId()));
        }

        return $this->render('festival/index.html.twig', array(
            'festival' => $festival,
            'concerts' => $concerts,
            'form' => $editForm->createView(),
        ));
    }
}
