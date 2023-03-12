<x-layout>
    <x-slot:title>
        {{ $product->name }}
    </x-slot:title>
    <div class='container-fluid'>
        <div class="row justify-content-center">
            @include('products.productCard', ['product' => $product, 'expanded' => true])
        </div>
    </div>
</x-layout>
