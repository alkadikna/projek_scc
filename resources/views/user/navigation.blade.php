<header>
    </nav>
    <button class="openbtn" onclick="openMenu()">☰ Menu</button>
    <a href="{{ route('dashboard') }}">
        <div class="logo">Logo</div>
    </a>

    <nav>
        <ul>
            @isset($user)
            <li><button id="cart-button">Cart[{{$count}}]</button></li>
            @endisset($user)
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

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif



<div id="menu" class="side-menu">
    <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()">&times;</a>
    <div class="menu-content">
        
        @isset($user)
        <h2>Akun Saya</h2>
        <p>Nama Pengguna: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p> <br><br>
        @endisset


        <h3>Search by Categories</h3>
        <ul style="list-style-type: none;">
            <li><a href="{{ url('/category/casing') }}">Casing</a></li>
            <li><a href="{{ url('/category/motherboard') }}">Motherboard</a></li>
            <li><a href="{{ url('/category/processor') }}">Processor</a></li>
            <li><a href="{{ url('/category/ram') }}">RAM</a></li>
            <li><a href="{{ url('/category/storage') }}">Storage</a></li>
            <li><a href="{{ url('/category/vga') }}">VGA / Graphics Card</a></li>
            <li><a href="{{ url('/category/monitor') }}">Monitor</a></li>
            <li><a href="{{ url('/category/keyboard') }}">Keyboard</a></li>
            <li><a href="{{ url('/category/mouse') }}">Mouse</a></li>
        </ul>

        <!-- <h3>Filter by Price</h3>
        <div class="price-filter">
            <div class="slider-container">
                <input type="range" id="min-price" min="0" max="100000000" value="0" oninput="updatePriceRange()">
                <input type="range" id="max-price" min="0" max="100000000" value="100000000" oninput="updatePriceRange()">
                <div class="slider-track"></div>
            </div>
            <div class="price-display">
                <span id="min-price-display">0</span> - <span id="max-price-display">100000000</span>
            </div>
            <button type="button" onclick="applyPriceFilter()">Terapkan</button><br><br><br><br>
        </div> -->
    </div>
</div>