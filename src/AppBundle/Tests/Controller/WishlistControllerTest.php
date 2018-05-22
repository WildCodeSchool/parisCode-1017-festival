<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class WishlistControllerTest for connected users
 * @package AppBundle\Tests\Controller
 */
class WishlistControllerTest extends WebTestCase
{
    // Création d'un client User
    public function UserConnection()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'root',
            'PHP_AUTH_PW' => 'root',
        ));
        return $client;
    }

    /**
     * Test for wishlist festival Route
     */
    public function testRouteWishlistFestival()
    {
        $client = $this->UserConnection();
        $crawler = $client->request('POST', '/user/1/wishlist/1/add/festival/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}
