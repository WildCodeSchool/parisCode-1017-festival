<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Concert controller.
 *
 * @Route("concert")
 */
class ConcertController extends Controller
{
    /**
     * Lists all concert entities.
     *
     * @Route("/", name="concert_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $concerts = $em->getRepository('AppBundle:Concert')->findAll();

        return $this->render('concert/index.html.twig', array(
            'concerts' => $concerts,
        ));
    }

    /**
     * Creates a new concert entity.
     *
     * @Route("/new", name="concert_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $concert = new Concert();
        $form = $this->createForm('AppBundle\Form\ConcertType', $concert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($concert);
            $em->flush();

            return $this->redirectToRoute('concert_show', array('id' => $concert->getId()));
        }

        return $this->render('concert/new.html.twig', array(
            'concert' => $concert,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a concert entity.
     *
     * @Route("/{id}", name="concert_show")
     * @Method("GET")
     */
    public function showAction(Concert $concert)
    {
        $deleteForm = $this->createDeleteForm($concert);

        return $this->render('concert/show.html.twig', array(
            'concert' => $concert,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing concert entity.
     *
     * @Route("/{id}/edit", name="concert_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Concert $concert)
    {
        $deleteForm = $this->createDeleteForm($concert);
        $editForm = $this->createForm('AppBundle\Form\ConcertType', $concert);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concert_edit', array('id' => $concert->getId()));
        }

        return $this->render('concert/edit.html.twig', array(
            'concert' => $concert,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a concert entity.
     *
     * @Route("/{id}", name="concert_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Concert $concert)
    {
        $form = $this->createDeleteForm($concert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($concert);
            $em->flush();
        }

        return $this->redirectToRoute('concert_index');
    }

    /**
     * Creates a form to delete a concert entity.
     *
     * @param Concert $concert The concert entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Concert $concert)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('concert_delete', array('id' => $concert->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
