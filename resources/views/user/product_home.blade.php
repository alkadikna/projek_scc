<section class="new-items md-4">
    <div class="row justify-content-center d-flex">
        @foreach($data as $item)
        <div class="col-md-3 mb-3">
            <a href="{{ route('detail', $item->id) }}">
                <div class="card">
                    <a href="{{ route('detail', $item->id) }}">
                        <img src="{{ asset("productimage/{$item->image}") }}" alt="{{ $item->title }}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <form action="{{url('addcart', $item->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <button type="submit" class="add-to-cart">Add to Cart</button>
                            <div class="cart-quantity">
                                <input type="number" class="quantity" name="quantity" data-id="{{ $item->id }}" value="1" min="1">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
</section>
