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
        $uri = 'https://web.np.playstation.com/api/graphql/v1//op';

        $operationName = 'categoryGridRetrieve';
        $variables = [
                'id' => '1ce37c2a-7dc1-49cd-9628-c97c39c29f17',
                'pageArgs' =>
                    ['size' => 100,
                    'offset' => $offset],
                'sortBy' => null,
                'filterBy' => [],
                'facetOptions' => []
        ];

        $extensions = [
            'persistedQuery' => [
                'version' => 1,
                'sha256Hash' => '4ce7d410a4db2c8b635a48c1dcec375906ff63b19dadd87e073f8fd0c0481d35'
            ]
        ];

        $url = $uri . '?operationName=' . $operationName . '&variables=' .  json_encode($variables) . '&extensions=' . json_encode($extensions);

        $options = [
            'headers' => [
                'X-PSN-Store-Locale-Override' => 'pt-BR'
            ],
        ];
        return json_decode($this->client->request($method, $url, $options), true);
    }
}
