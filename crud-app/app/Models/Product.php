<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public $name;
    public $price;
    public $description;
    public $item_number;
    public $image;

    protected $fillable = ['name', 'price', 'description', 'item_number', 'image'];
}
