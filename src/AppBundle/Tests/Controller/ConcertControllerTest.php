<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ConcertControllerTest for concerts routes (connected user)
 * @package AppBundle\Tests\Controller
 */
class ConcertControllerTest extends WebTestCase
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
    public function testRouteConcertNew()
    {
        $client = $this->UserConnection();
        $crawler = $client->request('GET', '/festival/1/concert/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

    /**
     * Test for festival edit Route
     */
    public function testRouteConcertEdit()
    {
        $client = $this->UserConnection();
        $crawler = $client->request('GET', '/festival/1/concert/1/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}
