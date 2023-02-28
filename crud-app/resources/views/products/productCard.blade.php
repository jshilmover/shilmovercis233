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
            @if ($expanded)
                <h5 class="mt-3">Leave a review</h5>
                <form class="my-2">
                    <select class="form-select" aria-label="rating-select">
                        <option selected>Select a rating</option>
                        <option value="1" id="rating">1</option>
                        <option value="2" id="rating">2</option>
                        <option value="3" id="rating">3</option>
                        <option value="4" id="rating">4</option>
                        <option value="5" id="rating">5</option>
                    </select>
                    <div class="my-2">
                        <label for="review-comment" class="form-label">Comment:</label>
                        <textarea class="form-control" name="reviewComment" id="reviewComment" rows="3">{{ old('description') ?? $product->reviewComment }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
