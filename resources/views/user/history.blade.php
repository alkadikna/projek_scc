<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* .history {
            margin-top: 20px;
        } */

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card a {
            text-decoration: none;
            color: inherit;
        }

        .card h3 {
            font-size: 1.5rem;
            color: #333;
        }

        .card p {
            font-size: 1rem;
            color: #666;
        }

        .card .card-body {
            padding: 20px;
        }

        /* .alert {
            margin-top: 20px;
        } */
    </style>
</head>
<body>
    @include('user.navigation')

    <main class="container">
        <div class="history">
            <h2 class="text-center mb-4" style="font-size: 2vmax;">Order History</h2>
            @if($orders->isEmpty())
                <div class="alert alert-info text-center">
                    <p>You have no order history.</p>
                </div>
            @else
                @foreach($orders as $order)
                    <div class="card">
                        <a href="{{ route('detailHistory', ['id'=> $order->id]) }}">
                            <div class="card-body">
                                <h3>Order #{{ $order->id }}</h3>
                                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                                <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>
                            </div>
                        </a>
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
