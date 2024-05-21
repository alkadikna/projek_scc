<div id="cart-modal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Cart</h2>
        <div class="cart">
            <table id="cart-items">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->product_title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Total: $<span id="total-price">{{ $cart->sum('price') }}</span></p>
            <a href="{{ url('/checkout')}}"><button id="checkout-button">Checkout</button></a>
            
        </div>
    </div>
</div>