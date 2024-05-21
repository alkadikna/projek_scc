<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cart.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}" >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('user.navigation')
    
    @isset($cart)
    @include('user.modal')
    @endisset($cart)

    @include('user.searchbar')
    
    <section class="new-items md-4">
    <h2>{{ $data->title }}</h2>
    <div class="row justify-content-center d-flex">

        <div class="card d-flex flex-column justify-content-center">
            <img src="{{ asset("productimage/{$data->image}") }}" alt="{{ $data->title }}" class="card-img-top">
            <div class="card-body">
                <p class="card-text">{{ $data->description }}</p>
                <p class="card-text">Category: {{ $data->category }}</p>
                <p class="card-text">Price: {{ $data->price }}</p>
                <p class="card-text">Quantity: {{ $data->quantity }}</p>
                <form action="{{url('addcart', $data->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $data->id }}">
                    <button type="submit" class="add-to-cart">Add to Cart</button>
                    <div class="cart-quantity">
                        <input type="number" class="quantity" name="quantity" data-id="{{ $data->id }}" value="1" min="1">
                    </div>
                </form>
            </div>
        </div>


        </div>
    </div>
</section>

    <script src="{{ asset('Projek Pemweb/cart.js') }}"></script>
    <script src="{{ asset('Projek Pemweb/menu.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
