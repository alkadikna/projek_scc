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
        .history {
            margin-top: 50px;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card h2, .card h4, .card p {
            color: #333;
        }

        .card h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .card p {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .card ul {
            list-style-type: none;
            padding: 0;
        }

        .card ul li {
            background: #f8f9fa;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }

        .card ul li:nth-child(odd) {
            background: #e9ecef;
        }

        .card ul li span {
            font-weight: bold;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .card-body {
            padding: 30px;
        }
    </style>
</head>
<body>
    @include('user.navigation')

    <main class="container">
        <div class="history">
            <div class="card">
                <div class="card-body">
                    <h2>Order #{{ $orders->id }}</h2>
                    <p><strong>Order Date:</strong> {{ $orders->created_at->format('d M Y, H:i') }}</p>
                    <p><strong>Email:</strong> {{ $orders->email }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($orders->payment_method) }}</p>
                    <h4>Items:</h4>
                    <ul>
                        @foreach($orders->items as $item)
                            <li><span>{{ $item['product_title'] }}</span> - Quantity: {{ $item['quantity'] }} - Price: ${{ $item['price'] }}</li>
                        @endforeach
                    </ul>
                    <br><h4><strong>Payment Proof:</strong></h4>
                    <img src="{{ asset('Bukti Pembayaran/' . $orders->payment_proof) }}" style="max-height: 25%; max-width: 25%;">

                    <p><strong>Total Price:</strong> ${{ $orders->total_price }}</p>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('Projek Pemweb/cart.js') }}"></script>
    <script src="{{ asset('Projek Pemweb/menu.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
