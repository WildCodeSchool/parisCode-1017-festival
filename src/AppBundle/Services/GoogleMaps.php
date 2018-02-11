<?php

namespace AppBundle\Services;

use GuzzleHttp\Client;

class GoogleMaps
{
    private $api_google;

    public function __construct($api_google)
    {
        $this->api_google = $api_google;
    }

    /**
     * @param $formattedaddress
     * @return string
     */
    public function regularGeocoding($formattedaddress){

        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedaddress . '&key=' . $this->api_google;

        $client = new Client();
        $google = $client->request("GET", $url);
        $google = json_decode($google->getBody()->getContents());

        if (isset($google->results[0])) {
            $location['lat'] = $google->results[0]->geometry->location->lat;
            $location['lng'] = $google->results[0]->geometry->location->lng;
            $location['place_id'] = $google->results[0]->place_id;
            return $location;
        }else {
            return 'error';
        }
    }

    /**
     * @param $formattedaddress
     * @return string
     */
    public function nameGeocoding($formattedaddress){

        $location = $this->regularGeocoding($formattedaddress);

        $url = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $location['place_id'] . '&key=' . $this->api_google;

        $client = new Client();
        $google = $client->request("GET", $url);
        $google = json_decode($google->getBody()->getContents());

        if (isset($google->result->name)) {
            $location['name'] = $google->result->name;
            return $location;
        }
        else {
            return 'error';
        }
    }

    /**
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