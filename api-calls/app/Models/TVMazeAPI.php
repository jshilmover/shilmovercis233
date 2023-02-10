<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class TvMazeAPI
{

    public static function fetch($showNumber)
    {
        $response = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();

        $episodesCollection = collect($response);

        $episodes = $episodesCollection->map(function ($episode) use ($showNumber) {
            return Episode::firstOrCreate(['name' => $episode['name'], 'image' => $episode["image"]["medium"], 'season' => $episode["season"], 'episode' => $episode["number"], 'summary' => strip_tags($episode["summary"]), 'show_number' => $showNumber]);
        });

        return $episodes;
    }
}
