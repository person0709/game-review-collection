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
        $response = $client->get('https://chicken-coop.fr/rest/games', [
            'query' => ['title' => request('keyword')]
        ]);

        $json = json_decode($response->getBody(), true);
        return view('search')->with('games', $json['result']);
    }

    public function show($title, $platform)
    {
        $modPlat = strtolower($platform);

        switch ($modPlat) {
            case 'ps4':
                $modPlat = 'playstation-4';
                break;

            case 'ps3':
                $modPlat = 'playstation-3';
                break;

            case 'ps2':
                $modPlat = 'playstation-2';
                break;

            case 'ps1':
                $modPlat = 'playstation-1';
                break;

            case 'xone':
                $modPlat = 'xbox-one';
                break;

            case 'x360':
                $modPlat = 'xbox-360';
                break;

            case 'wiiu':
                $modPlat = 'wii-u';
                break;

            case 'vita':
                $modPlat = 'playstation-vita';
                break;
        }
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://chicken-coop.fr/rest/games/' . $title, [
            'query' => ['platform' => $modPlat]
        ]);

        $json = json_decode($response->getBody(), true);
        return view('details')->with([
            'details' => $json['result'],
            'platform' => $platform
            ]);
    }
}
