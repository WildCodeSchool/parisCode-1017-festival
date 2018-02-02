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
        // TODO Amandine (P3) - liste deroulante et saisie modifiable pour l'admin
        // TODO All : form a changer /profile/edit / wishlist
        // TODO All : register/confirmed redirection vers mon compte

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
        // TODO All : bouton rechargement live/ajax
        // TODO All : addresse googlemaps nom dans bdd

        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $festivals = $em->getRepository('AppBundle:Festival')->findAll();

        return $this->render('default/discover.html.twig', array(
            'user' => $user,
            'festivals' => $festivals,
        ));
    }
}