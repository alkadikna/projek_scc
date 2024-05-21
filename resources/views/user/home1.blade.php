<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <header>
        <div class="logo">Logo</div>
        <nav>
            <ul>
                <li><a href="#">Cart</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">Help/Support</a></li>
                <li>
                    <a href="#">Language/Bahasa</a>
                    <ul class="dropdown">
                        <li><a href="#">English</a></li>
                        <li><a href="#">Bahasa</a></li>
                    </ul>
                </li>
                <!-- <li><a href="#">Login|Masuk</a></li> -->
                <li>
                    @if (Route::has('login'))
                
                        @auth
                            <li><x-app-layout></x-app-layout></li>
                        @else
                            <li><a href="{{ route('login') }}">Log in</a></li>

                            @if (Route::has('register'))
                                <li?><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                
                    @endif
                </li>
            </ul>
        </nav>
    </header>

    <div class="search-bar">
        <form action="{{url('search')}}" method="get" class="form-inline">
            @csrf
            <input class="form-control" type="search" name="search" placeholder="Search...">
            <input type="submit" value="Search" class="btn" id="button">
        </form>
        
    </div>
    <section>
    <div>
        <img class="banner"src= "Projek Pemweb/sale_banner_1.jpg"></img> <img class="banner2"src="Projek Pemweb/banner.jpg" ></img>
    </div>
    </section>

    @include('user.newproduct')

    <section class="hot-deals">
        <h2>Hot deals!</h2>
        <div class="deals-grid">
            <div class="deal-item"></div>
            <div class="deal-item"></div>
            <div class="deal-item"></div>
            <!-- Add more items as needed -->
        </div>
    </section>
</body>
</html>
