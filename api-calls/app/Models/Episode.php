<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// $episode = Episode::create(['name' => 'Test Episode', 'image' => 'test image', 'season' => 1, 'episode' => 1, 'summary' => "test summary", 'show_number' => 1]);

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'season', 'episode', 'summary', 'show_number'];
}
