<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Festival;
use AppBundle\Entity\User;
use AppBundle\Entity\Wishlist;
use AppBundle\Services\GoogleMaps;
use FOS\UserBundle\Controller\ProfileController;
use FOS\UserBundle\Controller\RegistrationController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("user")
 */
class UserController extends Controller
{
    /**
     * Creates a new user entity.
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, GoogleMaps $formattedaddress)
    {
        $user = new User();
        $form = $this->createForm('AppBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if ($user->getAddress()){
                $location = $formattedaddress->regularGeocoding($user->getAddress());

                $user->getAddress()->setLatitude($location['lat']);
                $user->getAddress()->setLongitude($location['lng']);
                $user->getAddress()->setName($location['place_id']);
                $user->getAddress()->setName($location['place_id']);
            }

            $em->persist($user);
            $em->flush();

            $wishlist = new Wishlist();
            $wishlist->setId($user->getId());
            $wishlist->setUser($user);
            $em->persist($wishlist);
            $em->flush();

            $user->setWishlist($wishlist->getId());

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     * @Route("/{id}", name="user_show")
     * @Method("GET")
     */
    public function showAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();

        $genres = $em->getRepository('AppBundle:Genre')->findAll();
        $artists = $em->getRepository('AppBundle:Artist')->findAll();
        $locations = $em->getRepository('AppBundle:Location')->findAll();
        $concerts = $em->getRepository('AppBundle:Concert')->findAll();
        $festivals = $em->getRepository('AppBundle:Festival')->findAll();
        $wishlist = $em->getRepository('AppBundle:Wishlist')->findAll();
        
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'wishlist' => $wishlist,
            'genres' => $genres,
            'artists' => $artists,
            'locations' => $locations,
            'concerts' => $concerts,
            'festivals' => $festivals,
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('@FOSUser/Profile/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('fos_user_profile_show');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
