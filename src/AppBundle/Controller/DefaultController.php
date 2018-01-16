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
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        // TODO : Agathe
        return $this->render('default/register.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        // TODO : Agathe - css body pour descendre le titre
        return $this->render('default/login.html.twig');
    }

    /**
     * @Route("/addfestival", name="addfestival")
     */
    public function addfestivalAction(Request $request)
    {
        // TODO : Agathe
        return $this->render('default/addfestival.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // TODO : Agathe
        return $this->render('default/contact.html.twig');
    }

    /**
     * @Route("/discover", name="discover")
     */
    public function discoverAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $festivals = $em->getRepository('AppBundle:Festival')->findAll();
        $users = $em->getRepository('AppBundle:User')->findOneById(1);

        return $this->render('discover.html.twig', array(
            'festivals' => $festivals,
            'users' => $users
        ));

        // TODO : la modal n'apparait pas dans tous les medias queries
        // TODO : database, fixtures,...
        // TODO : ajouter des ifs pour les informations facultatives
        // TODO : relation wishlist aveugle coté user
        // TODO : LN

        return $this->render('default/discover.html.twig');
    }

}