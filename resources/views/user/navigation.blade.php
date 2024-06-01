<header class="d-flex align-items-center p-3 bg-lightblue">
    <button class="btn btn-outline-primary mr-3" onclick="openMenu()">☰ Menu</button>
    <a href="{{ route('dashboard') }}" class="mr-auto">
        <div class="logo font-weight-bold">Logo</div>
    </a>

    <nav style="display: flex; align-item: center;">
        <ul class="nav">
            @isset($user)
            <li class="nav-item" style="transform: translateX(50%);">
                <button id="cart-button" class="btn btn-light d-flex align-items-center" style="background-color: lightblue; border-color: lightblue" >
                    <img src="{{ asset('Projek pemweb/cart-removebg-preview.png') }}" alt="" class="gambar-cart mr-2">
                    <span>[{{$count}}]</span>
                </button>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('history') }}">
                    <img src="{{ asset('Projek pemweb/image-removebg-preview (15).png') }}" alt="" class="icon-history">
                </a>
            </li>
            @endisset($user)
            <li class="nav-item">
                @if (Route::has('login'))
                    @auth
                        <li class="logged-in"><x-app-layout></x-app-layout></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
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
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div id="menu" class="side-menu">
    <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()">&times;</a>
    <div class="menu-content p-3">
        @isset($user)
        <h2>Akun Saya</h2>
        <p>Nama Pengguna: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p> <br><br>
        @endisset

        <h3>Filter by Categories</h3>
        <ul class="list-unstyled">
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
    </div>
</div>

