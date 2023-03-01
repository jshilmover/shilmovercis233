<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;


class Review extends Model
{
    use HasFactory;

    /**
     * Get the product that owns the review.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static
    function validateEntry(Request $request)
    {
        return
            $request->validate([
                'product_id' => 'required',
                'rating' => 'required|numeric',
                'comment' => 'required'
            ]);
    }

    protected $fillable = ['comment', 'rating', 'product_id'];
}
