<?php

namespace AppBundle\Services;
use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Tests\Controller;

class GoogleMaps
{
    private $api_google;

    public function __construct($api_google)
    {
        $this->api_google = $api_google;
    }

    public function regularGeocoding($formattedaddress){

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedaddress . '&key=' . $this->api_google;

        $client = new Client();
        $google = $client->request("GET", $url);
        $google = json_decode($google->getBody()->getContents());

        $location['lat'] = $google->results[0]->geometry->location->lat;
        $location['lng'] = $google->results[0]->geometry->location->lng;
        $location['place_id'] = $google->results[0]->place_id;

        return $location;

    }

    public function reverseGeocoding($lat, $lng){

        $url = ' https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&key=' . $this->api_google;
        $client = new Client();
        $google = $client->request("GET", $url);
        $google = json_decode($google->getBody()->getContents());

        $formattedaddress['formatted_address'] = $google->results[0]->formattedaddress;

        return $formattedaddress;
    }
}