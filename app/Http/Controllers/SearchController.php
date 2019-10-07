<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

class SearchController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://api.rawg.io/api/games', [
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
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://api.rawg.io/api/games/' . $slug);

        $json = json_decode($response->getBody(), true);
        return view('details')->with([
            'details' => $json
            ]);
    }
}
