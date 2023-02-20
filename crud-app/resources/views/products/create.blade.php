<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product ? 'Edit a product' : 'Create new Product' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
