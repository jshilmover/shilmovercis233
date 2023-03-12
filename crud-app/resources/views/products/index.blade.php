<x-layout>
    <x-slot:title>
        Products
    </x-slot:title>
    <div class='container'>
        <div class='row justify-content-center'>
            <button type="button" class="btn btn-primary col-9 w-100 mt-2"
                onclick="window.location.href='/products/create';">Add
                a
                Product</button>
            @foreach ($products as $product)
                @include('products.productCard', ['product' => $product, 'expanded' => false])
            @endforeach
        </div>
        {{ $products->links() }}
</x-layout>
