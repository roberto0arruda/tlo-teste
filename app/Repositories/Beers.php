<?php

namespace App\Repositories;

use GuzzleHttp\Client;

class Beers
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        return $this->get("v2/beers");
    }

    public function find($id)
    {
        return $this->get("v2/beers/{$id}");
    }

    public function search($search)
    {
        // beer_name, ids
        return $this->get("v2/beers?beer_name={$search}");
    }

    public function random()
    {
        return $this->get("v2/beers/random");
    }
    
    protected function get($url)
    {
        $response = $this->client->request('GET', $url);

        return json_decode($response->getBody()->getContents());
    }
}