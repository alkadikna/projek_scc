<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/checkout.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cart.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}" >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('user.navigation')


    <main class="container">
        <div class="payment-section">
            <div class="payment-form">
                <h2>Payment</h2>
                <form id="payment-form" action="{{ url('/order') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="payment-method">Select Payment Method:</label>
                        <div class="payment-options">
                            <div>
                                <input type="radio" id="gopay" name="payment-method" value="gopay" required>
                                <label for="gopay"><img src="Projek Pemweb/gopay.png" alt="Gopay" class="payment-icon"> Gopay</label>
                            </div>
                            <div>
                                <input type="radio" id="ovo" name="payment-method" value="ovo">
                                <label for="ovo"><img src="Projek Pemweb/ovo.png" alt="OVO" class="payment-icon"> OVO</label>
                            </div>
                            <div>
                                <input type="radio" id="dana" name="payment-method" value="dana">
                                <label for="dana"><img src="Projek Pemweb/dana.png" alt="Dana" class="payment-icon"> Dana</label>
                            </div>
                            <div>
                                <input type="radio" id="transfer-bank" name="payment-method" value="transfer-bank">
                                <label for="transfer-bank"><img src="Projek Pemweb/transfer-bank.png" alt="Transfer Bank" class="payment-icon"> Transfer Bank</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <a href="{{ route('dashboard') }}" class="back-btn">Back</a>
                        <button type="submit" class="confirm-btn">Confirm and Pay</button>
                    </div>
                </form>
            </div>
            <div class="order-summary">
                <h2>Order Summary</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->product_title }}</td>
                        <td>
                            <form action="{{ url('update', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}">
                                <button type="submit" class="btn btn-info">Update</button>
                            </form>
                        </td>
                        <td>${{ $item->price }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{url('delete',$item->id)}}">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
                <br>
                <h5>Total Price: ${{ $cart->sum('price')}}.00</h5>
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
