@extends('dashboard')

@section('content')
    <div class='container-fluid'>
        <div class="row justify-content-center">
            @include('products.productCard', ['product' => $product, 'expanded' => true])
        </div>
    </div>
@stop
