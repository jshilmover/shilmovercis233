<?php
namespace App\Models;

class Episode {
    public $name;
    public $image;
    public $season;
    public $episode;
    public $summary;

    public function __construct($name, $image, $season, $episode, $summary)
    {
        $this->name = $name;
        $this->image = $image;
        $this->season = $season;
        $this->episode = $episode;
        $this->summary = $summary;
    }
}