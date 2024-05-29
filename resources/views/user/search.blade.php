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

    @include('user.product_home')

    <script src="{{ asset('Projek Pemweb/cart.js') }}"></script>
    <script src="{{ asset('Projek Pemweb/menu.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
