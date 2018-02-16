<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ApiControllerTest for admin and API routes
 * @package AppBundle\Tests\Controller
 */
class ApiControllerTest extends WebTestCase
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
     * Test for calendar Route
     */
    public function testRouteCalendar()
    {
        $client = $this->UserConnection();
        $crawler = $client->request('GET', '/api/calendar');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test for search Route
     */
    public function testRouteSearch()
    {
        $client = $this->UserConnection();
        $crawler = $client->request('POST', '/api/search', array(), array(), array(
            'HTTP_X-Requested-With' => 'XMLHttpRequest',
        ), array('search' => 'Ree'));
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test for autocomplete Route
     */
    public function testRouteAutocomplete()
    {
        $client = $this->UserConnection();
        $crawler = $client->request('GET', '/api/autocomplete');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

//    /**
//     * Test for admin Route (redirect to Login)
//     */
//    public function testRouteAdmin()
//    {
//        $client = static::createClient();
//        $crawler = $client->request('GET', '/admin');
//        $client->followRedirect();
//        $this->assertEquals('EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController::indexAction',
//            $client->getRequest()->attributes->get('_controller'));
//    }

}
