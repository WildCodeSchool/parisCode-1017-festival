<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Festival;
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
     * Lists all festival entities.
     *
     * @Route("/", name="festival_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $festivals = $em->getRepository('AppBundle:Festival')->findAll();

        return $this->render('festival/index.html.twig', array(
            'festivals' => $festivals,
        ));
    }

    /**
     * Creates a new festival entity.
     *
     * @Route("/new", name="festival_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $festival = new Festival();
        $form = $this->createForm('AppBundle\Form\FestivalType', $festival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($festival);
            $em->flush();

            return $this->redirectToRoute('festival_show', array('id' => $festival->getId()));
        }

        return $this->render('festival/new.html.twig', array(
            'festival' => $festival,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a festival entity.
     *
     * @Route("/{id}", name="festival_show")
     * @Method("GET")
     */
    public function showAction(Festival $festival)
    {
        $deleteForm = $this->createDeleteForm($festival);

        return $this->render('festival/show.html.twig', array(
            'festival' => $festival,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing festival entity.
     *
     * @Route("/{id}/edit", name="festival_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Festival $festival)
    {
        $deleteForm = $this->createDeleteForm($festival);
        $editForm = $this->createForm('AppBundle\Form\FestivalType', $festival);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('festival_edit', array('id' => $festival->getId()));
        }

        return $this->render('festival/edit.html.twig', array(
            'festival' => $festival,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a festival entity.
     *
     * @Route("/{id}", name="festival_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Festival $festival)
    {
        $form = $this->createDeleteForm($festival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($festival);
            $em->flush();
        }

        return $this->redirectToRoute('festival_index');
    }

    /**
     * Creates a form to delete a festival entity.
     *
     * @param Festival $festival The festival entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Festival $festival)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('festival_delete', array('id' => $festival->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
