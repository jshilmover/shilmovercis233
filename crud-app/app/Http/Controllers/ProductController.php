<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products/index', [
            'products' => Product::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        return view('products/create', ['product' => new Product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        $validated = Product::validateEntry($request);

        $product = new Product;
        $product->name = $request->productName;
        $product->price = $request->productPrice;
        $product->item_number = $request->itemNumber;
        $product->description = $request->description;
        $product->image = fake()->imageUrl(640, 480, $request->productName, true, '');

        $product->save();
        return view('products/index', [
            'products' => Product::paginate(10)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products/show', [
            'product' => Product::where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->user()->cannot('edit', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        return view('products/create', [
            'product' => Product::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->user()->cannot('edit', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        $validated = Product::validateEntry($request);

        $product = Product::find($id);
        $product->name = $request->productName;
        $product->price = $request->productPrice;
        $product->item_number = $request->itemNumber;
        $product->description = $request->description;

        $product->save();
        return redirect()->action([ProductController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->cannot('delete', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        $product = Product::find($id);
        $product->delete();

        return redirect()->action([ProductController::class, 'index']);
    }
}
