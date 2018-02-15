<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Artist;
use AppBundle\Entity\Concert;
use AppBundle\Entity\Festival;
use AppBundle\Entity\Genre;
use AppBundle\Entity\Location;
use AppBundle\Entity\Wishlist;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Wishlist controller.
 *
 * @Route("/user/{user_id}/wishlist", requirements={"user_id": "\d+"}))
 * @ParamConverter("user",            options={"mapping": {"user_id": "id"}})
 * @ParamConverter("wishlist")
 * @package                           AppBundle\Controller
 */
class WishlistController extends Controller
{
    /**
     * Add/remove festival to wishlist
     *
     * @Route("/{id}/add/festival/{festival_id}", name="wishlist_festival", requirements={"festival_id": "\d+"}))
     * @Method({"GET",                            "POST"})
     * @ParamConverter("festival",                options={"mapping": {"festival_id": "id"}})
     * @param                                     Request  $request
     * @param                                     Festival $festival_id
     * @param                                     Wishlist $wishlist
     * @return                                    JsonResponse
     */
    public function festivalAction(Request $request, Festival $festival_id, Wishlist $wishlist)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $array = (array) $wishlist->getFestival()->getValues();

            if (in_array($festival_id, $array)) {
                $wishlist->removeFestival($festival_id);
                $response = false;
            } else {
                $wishlist->addFestival($festival_id);
                $response = true;
            }
            $em->flush();

            return new JsonResponse($response);
        } else {
            throw new HttpException('not an ajax call', 500);
        }
    }

    /**
     * Add/remove concert to wishlist
     *
     * @Route("/{id}/add/concert/{concert_id}", name="wishlist_concert", requirements={"concert_id": "\d+"}))
     * @Method({"GET",                          "POST"})
     * @ParamConverter("concert",               options={"mapping": {"concert_id": "id"}})
     * @param                                   Request  $request
     * @param                                   Concert  $concert_id
     * @param                                   Wishlist $wishlist
     * @return                                  JsonResponse
     */
    public function concertAction(Request $request, Concert $concert_id, Wishlist $wishlist)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $array = (array) $wishlist->getConcert()->getValues();

            if (in_array($concert_id, $array)) {
                $wishlist->removeConcert($concert_id);
                $response = false;
            } else {
                $wishlist->addConcert($concert_id);
                $response = true;
            }
            $em->flush();

            return new JsonResponse($response);
        } else {
            throw new HttpException('not an ajax call', 500);
        }
    }

    /**
     * Add/remove artist to wishlist
     *
     * @Route("/{id}/add/artist/{artist_id}", name="wishlist_artist", requirements={"artist_id": "\d+"}))
     * @Method({"GET",                        "POST"})
     * @ParamConverter("artist",              options={"mapping": {"artist_id": "id"}})
     * @param                                 Artist   $artist_id
     * @param                                 Wishlist $wishlist
     * @return                                \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function artistAction(Artist $artist_id, Wishlist $wishlist)
    {
        $em = $this->getDoctrine()->getManager();

        $array = (array) $wishlist->getArtist()->getValues();
        if (in_array($artist_id, $array)) {
            $wishlist->removeArtist($artist_id);
        } else {
            $wishlist->addArtist($artist_id);
        }

        $em->persist($wishlist);
        $em->flush();

        return $this->redirectToRoute('fos_user_profile_show');
    }

    /**
     * Add/remove genre to wishlist
     *
     * @Route("/{id}/add/genre/{genre_id}", name="wishlist_genre", requirements={"genre_id": "\d+"}))
     * @Method({"GET",                      "POST"})
     * @ParamConverter("genre",             options={"mapping": {"genre_id": "id"}})
     */
    public function genreAction(Genre $genre_id, Wishlist $wishlist)
    {
        $em = $this->getDoctrine()->getManager();

        $array = (array) $wishlist->getGenre()->getValues();
        if (in_array($genre_id, $array)) {
            $wishlist->removeGenre($genre_id);
        } else {
            $wishlist->addGenre($genre_id);
        }

        $em->persist($wishlist);
        $em->flush();

        return $this->redirectToRoute('fos_user_profile_show');
    }

    /**
     * Add/remove concert to wishlist
     *
     * @Route("/{id}/add/location/{location_id}", name="wishlist_location", requirements={"location_id": "\d+"}))
     * @Method({"GET",                            "POST"})
     * @ParamConverter("location",                options={"mapping": {"location_id": "id"}})
     * @param                                     Location $location_id
     * @param                                     Wishlist $wishlist
     * @return                                    \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function locationAction(Location $location_id, Wishlist $wishlist)
    {
        $em = $this->getDoctrine()->getManager();

        $array = (array) $wishlist->getLocation()->getValues();
        if (in_array($location_id, $array)) {
            $wishlist->removeLocation($location_id);
        } else {
            $wishlist->addLocation($location_id);
        }

        $em->persist($wishlist);
        $em->flush();

        return $this->redirectToRoute('fos_user_profile_show');
    }

}
