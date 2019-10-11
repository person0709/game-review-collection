<?php

namespace App\Services;

interface IGameAPIService
{
    function searchGames(string $keyword, string $pageSize);

    function getDetails(string $slug);
}
