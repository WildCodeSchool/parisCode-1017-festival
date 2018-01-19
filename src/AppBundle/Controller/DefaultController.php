<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Artist;
use AppBundle\Entity\Genre;
use AppBundle\Entity\Location;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Festival;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // TODO : Amandine
        // TODO : Footer en bas de toutes les pages
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        // TODO : All sprint 3
        return $this->render('default/register.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        // TODO : All sprint 3
        return $this->render('default/login.html.twig');
    }

    /**
    * @Route("/discover", name="discover")
    */
    public function discoverAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $festivals = $em->getRepository('AppBundle:Festival')->findAll();
        $users = $em->getRepository('AppBundle:User')->findOneById(1);

        return $this->render('default/discover.html.twig', array(
            'festivals' => $festivals,
            'users' => $users
        ));

        // TODO : LN
        // TODO : la modal n'apparait pas dans tous les medias queries
        // TODO : ajouter des ifs pour les informations facultatives
        // TODO : relation wishlist aveugle coté user

    }

    /**
     * @Route("/addfestival", name="addfestival")
     */
    public function addfestivalAction(Request $request)
    {
        // TODO : Helene
        return $this->render('default/addfestival.html.twig');
    }

    /**

    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request)
    {
        // TODO : Agathe

        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:User')->findOneById(1);

        return $this->render('default/profile.html.twig', array(
            'user' => $user
        ));
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {
        // TODO : Amandine

        return $this->render('default/admin.html.twig');
    }

    /**
     * @Route("/myaccount", name="user_account")
     */
    public function myAccountAction(Request $request)
    {
        // TODO : Agathe

        return $this->render('default/myaccount.html.twig');
    }

    /**
     * @Route("/changemail", name="change_mail")
     */
    public function changeEmailAction(Request $request)
    {
        // TODO : Agathe

        return $this->render('default/change_email.html.twig');
    }

    /**
     * @Route("/changepassword", name="change_password")
     */
    public function changePasswordAction(Request $request)
    {
        // TODO : Agathe

        return $this->render('default/change_password.html.twig');
    }

    /**
     * @Route("/wishlist", name="wishlist")
     */
    public function wishlistAction(Request $request)
    {
        // TODO : Agathe

        return $this->render('default/wishlist.html.twig');
    }

    // 2 - Création de la fonction qui a pour Action de Select tous les artistes et de les rendre sur la vue choisie:
    /**
     * @Route("/wishlist", name="wishlist")
     */
    public function selectAction(Request $request)
    {
        $genres = $this->getDoctrine()
        ->getRepository(Genre::class)
        ->getAllGenres();

        $artists = $this->getDoctrine()
        ->getRepository(Artist::class)
        ->getAllArtists();

        $locations = $this->getDoctrine()
        ->getRepository(Location::class)
        ->getAllLocations();

        return $this->render('default/wishlist.html.twig', array(
            'genres'=>$genres,
            'artists'=>$artists,
            'locations'=>$locations,
        ));
    }
    // Next: 3 - Faire une boucle dans la vue choisie pour afficher les Artistes contenus dans la base.

}