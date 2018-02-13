<?php

namespace AppBundle\Services;

use AppBundle\Entity\Location;
use GuzzleHttp\Client;

class GoogleMaps
{
    private $api_google;

    public function __construct($api_google)
    {
        $this->api_google = $api_google;
    }

    /**
     * Format form address into lat/lng/name if exists. Else, no lat/lng. If empty, nothing.
     *
     * @param $formattedaddress
     * @return string
     */
    public function regularGeocoding($formattedaddress)
    {
        $location['address'] = $formattedaddress;
        $location['name'] = $formattedaddress;
        $location['lat'] = null;
        $location['lng'] = null;

        if (!empty($formattedaddress)) {
            $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedaddress . '&key=' . $this->api_google;

            $client = new Client();
            $google = $client->request("GET", $url);
            $google = json_decode($google->getBody()->getContents());

            if (isset($google->results[0]->geometry->location)) {
                $location['lat'] = $google->results[0]->geometry->location->lat;
                $location['lng'] = $google->results[0]->geometry->location->lng;
            }
            if (isset($google->results[0]->place_id)) {
                $location['name'] = $this->nameGeocoding($google->results[0]->place_id);
            }
        }
        return $location;
    }

    /**
     * Rename place_id into Place name
     *
     * @param $formattedaddress
     * @return string
     */
    public function nameGeocoding($place_id){

        $url = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $place_id . '&key=' . $this->api_google;

        $client = new Client();
        $google = $client->request("GET", $url);

        $google = json_decode($google->getBody()->getContents());

        if (isset($google->result->name)) {
            $location['name'] = $google->result->name;
            return $location['name'];
        }
    }

    /**
     * Reverse geocoding lat/lng into address
     *
     * @param $lat
     * @param $lng
     * @return mixed
     */
    public function reverseGeocoding($lat, $lng){

        $url = ' https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&key=' . $this->api_google;
        $client = new Client();
        $google = $client->request("GET", $url);
        $google = json_decode($google->getBody()->getContents());

        $formattedaddress['formatted_address'] = $google->results[0]->formattedaddress;

        return $formattedaddress;
    }

    /**
     * @param string $term
     *
     * @return array
     */
    public function autocompleteCities($term){
        $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?input=" . $term . "&types=(cities)&key=" . $this->api_google;
        $client = new Client();
        $google = $client->request("GET", $url);
        $results = json_decode($google->getBody()->getContents());

        $cities = array();
        foreach ($results->predictions as $key => $result){
            if (isset($result->terms[1]->value)){
                $cities[] = $result->terms[0]->value . ', ' . $result->terms[1]->value;
            } else {
                $cities[] = $result->terms[0]->value;
            }
        }

        return $cities;
    }
}