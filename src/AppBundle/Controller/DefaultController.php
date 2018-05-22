<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 *
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * Page:Homepage with discover/plan sections.
     *
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * Page: Maps, cards, and search bar for all festivals.
     *
     * @Route("/discover", name="discover")
     * @Method("GET")
     */
    public function discoverAction()
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $festivals = $em->getRepository('AppBundle:Festival')->myFindAll();

        return $this->render(
            'default/discover.html.twig', array(
            'user' => $user,
            'festivals' => $festivals,
            )
        );
    }

    /**
     * Page: Maps, cards, and search bar for all festivals.
     *
     * @Route("/roulette", name="roulette")
     * @Method("GET")
     * @return             \Symfony\Component\HttpFoundation\Response
     */
    public function rouletteAction()
    {

        $em = $this->getDoctrine()->getManager();
        $festivals = $em->getRepository('AppBundle:Festival')->findAll();
        shuffle($festivals);
        return $this->render(
            'default/roulette.html.twig', array(
            'festivals' => $festivals,
            )
        );
    }
}