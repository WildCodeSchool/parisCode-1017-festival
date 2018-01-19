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
        // TODO : Amandine Footer en bas de toutes les pages
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        // TODO : All sprint 3 (FOSUserBundle)
        return $this->render('default/register.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        // TODO : All sprint 3 (FOSUserBundle)
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

        // TODO : LN - la modal n'apparait pas dans tous les medias queries
        // TODO : LN - relation wishlist aveugle coté user dans fixtures
        // TODO : LN - close modal avec moins de marge
        // TODO : LN - faire apparaitre les cards festivals avec un bouton en vue mobile
        // Done : LN - descendre cards en dessous de "search" sur vue tablette et desktop
        // Done: LN - texte modal alignement gauche
        // Done : LN - centrer icon sur les boutons wishlist et zoom-in
        // TODO : All - comportement des liens sur les boutons
        // Done : changement syntaxe bdd many to many
        // Done : centrage des icones et logo
        // Done : regarder si la route festival/new ou concert/new affecte la partie admin
        // Done : carte mobile taille
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
        // TODO : Amandine : liste deroulante et saisie pour l'admin
        // TODO : Amandine : recuperer info au lieu de l'ID

        return $this->render('default/admin.html.twig');
    }

}