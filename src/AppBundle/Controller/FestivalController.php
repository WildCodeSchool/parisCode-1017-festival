<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concert;
use AppBundle\Entity\Festival;
use AppBundle\Services\GoogleMaps;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Festival controller.
 *
 * @Route("festival")
 */
class FestivalController extends Controller
{
    /**
     * Page: Create a new festival.
     *
     * @Route("/new", name="festival_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, GoogleMaps $formattedaddress)
    {
        $festival = new Festival();
        $form = $this->createForm('AppBundle\Form\FestivalType', $festival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $location = $formattedaddress->regularGeocoding($festival->getLocation());

            $festival->getLocation()->setLatitude($location['lat']);
            $festival->getLocation()->setLongitude($location['lng']);
            $festival->getLocation()->setName($location['place_id']);

            $em->persist($festival);
            $em->flush();

            return $this->redirectToRoute('festival_edit', array('festival_id' => $festival->getId()));
        }

        return $this->render('festival/index.html.twig', array(
            'festival' => $festival,
            'form' => $form->createView(),
        ));
    }

    /**
     * Page: Edit a festival.
     *
     * @Route("/{festival_id}/edit", name="festival_edit", requirements={"festival_id": "\d+"}))
     * @ParamConverter("festival",   options={"mapping": {"festival_id": "id"}})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Festival $festival)
    {
        $em = $this->getDoctrine()->getManager();
        $concerts = $em->getRepository('AppBundle:Concert')->findBy(array('festival' => $festival->getId()));

        $editForm = $this->createForm('AppBundle\Form\FestivalType', $festival);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('festival_edit', array('festival_id' => $festival->getId()));
        }

        return $this->render('festival/index.html.twig', array(
            'festival' => $festival,
            'concerts' => $concerts,
            'edit_form' => $editForm->createView(),
        ));
    }

}
