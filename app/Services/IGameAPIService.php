<?php

interface IGameAPIServices
{
    public function searchGames(string $keyword, string $pageSize);

    public function getDetails(string $slug);
}
