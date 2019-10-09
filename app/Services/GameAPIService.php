<?php

namespace App\Services;

use GuzzleHttp\Exception\RequestException;
use IGameAPIServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

class GameAPIService implements IGameAPIServices
{
    public function searchGames(string $keyword, string $pageSize)
    {
    }

    public function getDetails(string $slug)
    {
    }
}
