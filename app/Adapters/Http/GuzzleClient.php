<?php

namespace App\Adapters\Http;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class GuzzleClient implements Client
{
    /**
     * @throws GuzzleException
     */
    public function request(string $method, string $uri, array $options = [])
    {
        $client = new Guzzle([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $request = new Request($method, $uri, $options['headers']);

        $response = $client->send($request);

        return $response->getBody()->getContents();

    }
}
