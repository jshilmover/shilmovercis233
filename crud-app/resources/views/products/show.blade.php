<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class='container-fluid'>
        <div class="row justify-content-center">
            {{--             <div class="col-sm-6 card">
                <img src={{ $product->image }} class='card-img-top'>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h6 class='card-subtitle mb-1'>Item number {{ $product->item_number }}</h6>
                    <h6 class='card-subtitle'>${{ $product->price }}</h6>
                    <p class='card-text'>{{ $product->description }}</p>
                    <div>
                        <button type="button" class="btn btn-primary mb-1 w-100"
                            onclick="window.location.href='/products/{{ $product->id }}/edit'">Edit
                            Product</button>
                        <form action="products/{{ $product->id }}" method="POST">
                            @csrf
                            <!-- {{ csrf_field() }} -->
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger w-100"
                                onclick="return confirm('Really delete?');">Delete
                                Product</button>
                        </form>
                    </div>
                </div>
            </div> --}}
            @include('products.productCard', ['product' => $product, 'expanded' => true])
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
