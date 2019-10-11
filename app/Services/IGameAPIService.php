<?php

namespace App\Services;

interface IGameAPIService
{
    public function __construct(\GuzzleHttp\Client $client);

    public function searchGames(string $keyword, string $pageSize);

    public function getDetails(string $slug);
}
