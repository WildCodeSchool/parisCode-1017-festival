<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Wishlist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Wishlist controller.
 *
 * @Route("wishlist")
 */
class WishlistController extends Controller
{
    /**
     * Lists all wishlist entities.
     *
     * @Route("/", name="wishlist_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $wishlists = $em->getRepository('AppBundle:Wishlist')->findAll();

        return $this->render('wishlist/index.html.twig', array(
            'wishlists' => $wishlists,
        ));
    }

    /**
     * Creates a new wishlist entity.
     *
     * @Route("/new", name="wishlist_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $wishlist = new Wishlist();
        $form = $this->createForm('AppBundle\Form\WishlistType', $wishlist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($wishlist);
            $em->flush();

            return $this->redirectToRoute('wishlist_show', array('id' => $wishlist->getId()));
        }

        return $this->render('wishlist/new.html.twig', array(
            'wishlist' => $wishlist,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a wishlist entity.
     *
     * @Route("/{id}", name="wishlist_show")
     * @Method("GET")
     */
    public function showAction(Wishlist $wishlist)
    {
        $deleteForm = $this->createDeleteForm($wishlist);

        return $this->render('wishlist/show.html.twig', array(
            'wishlist' => $wishlist,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing wishlist entity.
     *
     * @Route("/{id}/edit", name="wishlist_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Wishlist $wishlist)
    {
        $deleteForm = $this->createDeleteForm($wishlist);
        $editForm = $this->createForm('AppBundle\Form\WishlistType', $wishlist);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('wishlist_edit', array('id' => $wishlist->getId()));
        }

        return $this->render('wishlist/edit.html.twig', array(
            'wishlist' => $wishlist,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a wishlist entity.
     *
     * @Route("/{id}", name="wishlist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Wishlist $wishlist)
    {
        $form = $this->createDeleteForm($wishlist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($wishlist);
            $em->flush();
        }

        return $this->redirectToRoute('wishlist_index');
    }

    /**
     * Creates a form to delete a wishlist entity.
     *
     * @param Wishlist $wishlist The wishlist entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Wishlist $wishlist)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('wishlist_delete', array('id' => $wishlist->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
