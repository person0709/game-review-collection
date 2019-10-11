<?php

namespace App\Services;

use GuzzleHttp\Client;

class GameAPIService implements IGameAPIService
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function searchGames(string $keyword, string $pageSize)
    {
        $response = $this->client->get('https://api.rawg.io/api/games', [
            'query' => [
                'search'   => $keyword,
                'pageSize' => $pageSize,
            ],
        ]);

        $json = json_decode($response->getBody(), true);

        return $json;
    }

    public function getDetails(string $slug)
    {
        $response = $this->client->get('https://api.rawg.io/api/games/'.$slug);
        $json = json_decode($response->getBody(), true);

        return $json;
    }
}
