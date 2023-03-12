<x-layout>
    <x-slot:title>
        {{ strlen($product->name) > 0 ? 'Edit a product' : 'Create new Product' }}
    </x-slot:title>
    <div class="container mt-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ $product ? '/products/' . $product->id : '/products' }}" method="POST">
            @csrf
            <!-- {{ csrf_field() }} -->
            @if ($product)
                <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="mb-3">
                <label for="productName" class="form-label">Product name:</label>
                <input type="text" class="form-control" id="productName" name='productName'
                    value="{{ old('productName') ?? $product->name }}" aria-describedby="productName">
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Price:</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" id="productPrice" name="productPrice" aria-label="Price"
                        value="{{ old('productPrice') ?? $product->price }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="itemNumber" class="form-label">Item Number:</label>
                <input type="text" class="form-control" id="itemNumber" name="itemNumber"
                    value="{{ old('itemNumber') ?? $product->item_number }}" aria-describedby="itemNumber">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product Description:</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $product->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-layout>
