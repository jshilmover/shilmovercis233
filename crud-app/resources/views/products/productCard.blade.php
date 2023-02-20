<div class='card col-sm-12 col-md-3 mx-1 my-1'>
    <div class='card-body'>
        <img src={{ $product->image }} class='card-img-top'>
        <div class='card-title'>Name: <a href={{ '/products/' . $product->id }}>{{ $product->name }}</a>
        </div>
        <div class='card-text'>Price: ${{ $product->price }}</div>
        <div class='card-text'>Item Number: {{ $product->item_number }}</div>
        @if ($expanded)
            <p class='card-text'>{{ $product->description }}</p>
        @endif
        <div>
            <button type="button" class="btn btn-primary mb-1 w-100"
                onclick="window.location.href='/products/{{ $product->id }}/edit'">Edit
                Product</button>
            <form action="products/{{ $product->id }}" method="POST">
                @csrf
                <!-- {{ csrf_field() }} -->
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Really delete?');">Delete
                    Product</button>
            </form>
        </div>
    </div>
</div>
