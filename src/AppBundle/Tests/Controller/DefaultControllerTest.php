<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest for guests routes
 * @package AppBundle\Tests\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * Test for homepage Route
     */
    public function testRouteHomepage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test for discover Route
     */
    public function testRouteDiscover()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/discover');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test for roulette Route
     */
    public function testRouteRoulette()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/roulette');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
