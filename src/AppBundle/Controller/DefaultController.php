<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Artist;
use AppBundle\Entity\Genre;
use AppBundle\Entity\Location;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Festival;

class DefaultController extends Controller
{
    /**
     * Page:Homepage with discover/plan sections.
     *
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // TODO (P1) : Amandine Footer en bas de toutes les pages
        // TODO (P3) : Amandine : liste deroulante et saisie modifiable pour l'admin
        // TODO : form a changer /profile/edit
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
        // TODO : bouton rechargement live/ajax

        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $festivals = $em->getRepository('AppBundle:Festival')->findAll();

        return $this->render('default/discover.html.twig', array(
            'user' => $user,
            'festivals' => $festivals,
        ));
    }
}