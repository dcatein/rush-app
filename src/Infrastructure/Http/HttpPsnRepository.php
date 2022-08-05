<?php

namespace Src\Infrastructure\Http;

use App\Adapters\Http\Client;
use Src\Application\Repositories\PsnRepository;

class HttpPsnRepository implements PsnRepository
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getOffers($offset = 0)
    {
        $method = 'GET';
        $uri = 'https://web.np.playstation.com/api/graphql/v1//op?operationName=categoryGridRetrieve&variables=%7B%22id%22%3A%221ce37c2a-7dc1-49cd-9628-c97c39c29f17%22,%22pageArgs%22%3A%7B%22size%22%3A24,%22offset%22%3A0%7D,%22sortBy%22%3Anull,%22filterBy%22%3A%5B%5D,%22facetOptions%22%3A%5B%5D%7D&extensions=%7B%22persistedQuery%22%3A%7B%22version%22%3A1,%22sha256Hash%22%3A%224ce7d410a4db2c8b635a48c1dcec375906ff63b19dadd87e073f8fd0c0481d35%22%7D%7D';
        $options = [
            'headers' => [
                'X-PSN-Store-Locale-Override' => 'pt-BR'
            ]
        ];
        return json_decode($this->client->request($method, $uri, $options), true);
    }
}
