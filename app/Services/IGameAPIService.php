<?php
interface IGameAPIServices
{
    public function searchGames(String $keyword, String $pageSize);

    public function getDetails(String $slug);
}
