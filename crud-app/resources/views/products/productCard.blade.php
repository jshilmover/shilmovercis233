<div class='card mx-1 my-1 {{ $expanded ? 'col-12' : 'col-sm-12 col-md-3' }}'>
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
            @can('update', [App\Models\Product::class, $product])
                <button type="button" class="btn btn-primary mb-1 w-100"
                    onclick="window.location.href='/products/{{ $product->id }}/edit'">
                    Edit Product
                </button>
            @endcan
            @can('delete', [App\Models\Product::class, $product])
                <form action="products/{{ $product->id }}" method="POST">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Really delete?');">Delete
                        Product</button>
                </form>
            @endcan
            @if ($expanded)
                @can('create', App\Models\Review::class)
                    <h5 class="mt-3">Leave a review</h5>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="my-2" action="/review/" method="POST">
                        @csrf
                        <!-- {{ csrf_field() }} -->
                        <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                        <select class="form-select" aria-label="rating-select" id="rating" name="rating">
                            <option selected>Select a rating</option>
                            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5</option>
                        </select>
                        <div class="my-2">
                            <label for="comment" class="form-label">Comment:</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3">{{ old('comment') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endcan
                <h5 class="mb-2">Reviews:</h5>
                @if (count($product->reviews) == 0)
                    <div>No reviews yet!</div>
                @endif
                <ul class="list-group list-group-flush">
                    @foreach ($product->reviews as $review)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $review->rating }}
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        &#9733;
                                    @endfor
                                </div>
                                {{ $review->comment }}
                            </div>
                        </li>
                        @can('delete', [App\Models\Review::class, $review])
                            <form action="/review/{{ $review->id }}" method="POST" class="mb-2">
                                @csrf
                                <!-- {{ csrf_field() }} -->
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirm('Really delete?');">Delete
                                    Review</button>
                            </form>
                        @endcan
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
