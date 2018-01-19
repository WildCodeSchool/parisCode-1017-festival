<?php

namespace AppBundle\Services;
use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Tests\Controller;

class GoogleMaps
{
    public function regularGeocoding($formattedaddress){

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedaddress . '&key=' . 'AIzaSyAYXbFnRdca1QCM5X3FgxsQghNl0N6H2gA';
        $client = new Client();
        $google = $client->request("GET", $url);
        $google = json_decode($google->getBody()->getContents());
        // Traitement du resultat retourné par la requete

        // Renvoie du tableau contenant toutes les citations
        $location['lat'] = $google->results[0]->geometry->location->lat;
        $location['lng'] = $google->results[0]->geometry->location->lng;
//        $location = '{lat: ' . $location['lat'] . ', lng: ' . $location['lng'] . '}';
        return $location;
    }

    public function reverseGeocoding($lat, $lng){

        $url = ' https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&key=' . 'AIzaSyAYXbFnRdca1QCM5X3FgxsQghNl0N6H2gA';
        $client = new Client();
        $google = $client->request("GET", $url);
        $google = json_decode($google->getBody()->getContents());
        // Traitement du resultat retourné par la requete

        // Renvoie du tableau contenant toutes les citations
        $formattedaddress['formatted_address'] = $google->results[0]->formattedaddress;
        return $formattedaddress;
    }
}