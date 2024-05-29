<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('user.navigation')

    <main class="container">
        <div class="history">
            <h2>Order History</h2>
            @if($orders->isEmpty())
                <p>You have no order history.</p>
            @else
                @foreach($orders as $order)
                    <div class="card">
                        <h3>Order #{{ $order->id }}</h3>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                        <h4>Items:</h4>
                        <ul>
                            @foreach($order->items as $item)
                                <li>{{ $item['product_title'] }} - Quantity: {{ $item['quantity'] }} - Price: ${{ $item['price'] }}</li>
                            @endforeach
                        </ul>
                        <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </main>

    <script src="{{ asset('Projek Pemweb/cart.js') }}"></script>
    <script src="{{ asset('Projek Pemweb/menu.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
