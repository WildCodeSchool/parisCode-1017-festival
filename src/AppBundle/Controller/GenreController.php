<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Genre controller.
 *
 * @Route("genre")
 */
class GenreController extends Controller
{
    /**
     * Lists all genre entities.
     *
     * @Route("/", name="genre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $genres = $em->getRepository('AppBundle:Genre')->findAll();

        return $this->render('genre/index.html.twig', array(
            'genres' => $genres,
        ));
    }

    /**
     * Creates a new genre entity.
     *
     * @Route("/new", name="genre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $genre = new Genre();
        $form = $this->createForm('AppBundle\Form\GenreType', $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            return $this->redirectToRoute('genre_show', array('id' => $genre->getId()));
        }

        return $this->render('genre/new.html.twig', array(
            'genre' => $genre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a genre entity.
     *
     * @Route("/{id}", name="genre_show")
     * @Method("GET")
     */
    public function showAction(Genre $genre)
    {
        $deleteForm = $this->createDeleteForm($genre);

        return $this->render('genre/show.html.twig', array(
            'genre' => $genre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing genre entity.
     *
     * @Route("/{id}/edit", name="genre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Genre $genre)
    {
        $deleteForm = $this->createDeleteForm($genre);
        $editForm = $this->createForm('AppBundle\Form\GenreType', $genre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('genre_edit', array('id' => $genre->getId()));
        }

        return $this->render('genre/edit.html.twig', array(
            'genre' => $genre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a genre entity.
     *
     * @Route("/{id}", name="genre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Genre $genre)
    {
        $form = $this->createDeleteForm($genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($genre);
            $em->flush();
        }

        return $this->redirectToRoute('genre_index');
    }

    /**
     * Creates a form to delete a genre entity.
     *
     * @param Genre $genre The genre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Genre $genre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('genre_delete', array('id' => $genre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
