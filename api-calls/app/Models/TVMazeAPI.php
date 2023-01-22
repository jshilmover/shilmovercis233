<?php
namespace App\Models;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class TvMazeAPI {
    public static function fetch($episode) {
        $response = Http::get("https://api.tvmaze.com/shows/$episode/episodes")->json();

        $episodesCollection = collect($response);

        $episodes = $episodesCollection->each(function($episode) {
            return new Episode($episode["name"], $episode["image"]["medium"], $episode["season"], $episode["number"], $episode["summary"]);
        });
        return $episodes;
    }
}