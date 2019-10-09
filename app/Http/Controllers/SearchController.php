<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

class SearchController extends Controller
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }
    public function index()
    {
        $result = GameAPIService::searchGame('keyword', 'page');
        $response = $this->client->get('https://api.rawg.io/api/games', [
            'query' => [
                'search' => request('keyword'),
                'page_size' => 10,
            ]
        ]);

        $json = json_decode($response->getBody(), true);
        return view('search')->with('games', $json['results']);
    }

    public function show($slug)
    {
        $response = $this->client->get('https://api.rawg.io/api/games/' . $slug);

        $json = json_decode($response->getBody(), true);
        return view('details')->with([
            'details' => $json
            ]);
    }
}
