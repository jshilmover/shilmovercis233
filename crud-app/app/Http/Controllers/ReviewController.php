<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = Review::validateEntry($request);

        $review = new Review($validated);
        $review->save();

        return
            redirect()->route('products.show', ['product' => $review->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->cannot('delete', [Review::class, Review::find($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        $review = Review::find($id);
        $review->delete();

        return
            redirect()->route('products.show', ['product' => $review->product_id]);
    }
}
