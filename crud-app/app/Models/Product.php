<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    public static
    function validateEntry(Request $request)
    {
        return
            $request->validate([
                'productName' => 'required',
                'productPrice' => 'required|decimal:2',
                'itemNumber' => 'required|numeric',
                'description' => 'required'
            ]);
    }

    protected $fillable = ['name', 'price', 'description', 'item_number', 'image'];
}
