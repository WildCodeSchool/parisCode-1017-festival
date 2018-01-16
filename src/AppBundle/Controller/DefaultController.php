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
        // TODO : inserer code amandine

        $em = $this->getDoctrine()->getManager();

        $festivals = $em->getRepository('AppBundle:Festival')->findAll();
        $users = $em->getRepository('AppBundle:User')->findOneById(1);

        return $this->render('discover.html.twig', array(
            'festivals' => $festivals,
            'users' => $users
        ));
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
    }

}