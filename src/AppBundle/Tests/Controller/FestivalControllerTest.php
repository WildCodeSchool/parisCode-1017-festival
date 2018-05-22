<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class FestivalControllerTest for festivals routes (connected user)
 * @package AppBundle\Tests\Controller
 */
class FestivalControllerTest extends WebTestCase
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
     * Test for "Add Fest" Route
     */
    public function testRouteFestivalNew()
    {
        $client = $this->UserConnection();
        $crawler = $client->request('GET', '/festival/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test for festival edit Route
     */
    public function testRouteFestivalEdit()
    {
        $client = $this->UserConnection();
        $crawler = $client->request('GET', '/festival/1/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
