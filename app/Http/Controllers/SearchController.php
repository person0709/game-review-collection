<?php

namespace App\Http\Controllers;

use App\Services\IGameAPIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    private $apiService;

    public function __construct(IGameAPIService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $json = $this->apiService->searchGames(request('keyword'), 'page');

        return view('search')->with('games', $json['results']);
    }

    public function show()
    {
        $json = $this->apiService->getDetails(request('slug'));

        $review = Auth::check() ? Auth::user()->getReview($json['id']) : null;

        return view('details')->with([
            'details' => $json,
            'review'  => $review,
            ]);
    }
}
