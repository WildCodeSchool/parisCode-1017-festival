<?php

namespace AppBundle\Controller;

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

//    /**
//     * @Route("/register", name="register")
//     */
//    public function registerAction(Request $request)
//    {
//        // TODO : All sprint 3
//        return $this->render('default/register.html.twig');
//    }

//    /**
//     * @Route("/login", name="login")
//     */
//    public function loginAction(Request $request)
//    {
//        // TODO : All sprint 3
//        return $this->render('default/login.html.twig');
//    }

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

}