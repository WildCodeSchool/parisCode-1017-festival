<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        // TODO : Agathe
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
        // TODO : LN
        return $this->render('default/discover.html.twig');
    }

    /**
     * @Route("/plan", name="plan")
     */
    public function planAction(Request $request)
    {
        // TODO : All
        return $this->render('default/plan.html.twig');
    }
}
