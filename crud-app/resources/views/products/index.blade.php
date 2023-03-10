@extends('dashboard')

@section('content')
    <div class='container'>
        <div class='row justify-content-center'>
            @can('create', App\Models\Product::class)
                <button type="button" class="btn btn-primary col-9 w-100 mt-2" onclick="window.location.href='/products/create';">
                    Add a Product
                </button>
            @endcan
            @foreach ($products as $product)
                @include('products.productCard', ['product' => $product, 'expanded' => false])
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@stop
