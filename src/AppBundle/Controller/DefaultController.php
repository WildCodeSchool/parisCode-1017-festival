<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * Page:Homepage with discover/plan sections.
     *
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * Page: Maps, cards, and search bar for all festivals.
     *
     * @Route("/discover", name="discover")
     * @Method("GET")
     */
    public function discoverAction(Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $festivals = $em->getRepository('AppBundle:Festival')->myFindAll();

        return $this->render('default/discover.html.twig', array(
            'user' => $user,
            'festivals' => $festivals,
        ));
    }

    /**
     * Page: Maps, cards, and search bar for all festivals.
     *
     * @Route("/roulette", name="roulette")
     * @Method("GET")
     */
    public function rouletteAction()
    {

        $em = $this->getDoctrine()->getManager();
        $festivals = $em->getRepository('AppBundle:Festival')->findAll();

        return $this->render('default/roulette.html.twig', array(
            'festivals' => $festivals,
        ));
    }
}