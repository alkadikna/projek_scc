

<div class="modal" tabindex="-1" id="cart-modal">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content"style="background-color: #BFEFFF;">
      <div class="modal-header" style="background-color: #87CEEB;">
        <h2 class="modal-title">Cart</h2>
        <button type="button" class="close-button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
            </table> <Br> <br>
            <p style="display: flex; justify-content: right;">Total: $<span id="total-price">{{ $cart->sum('price') }}</span></p>
            
        </div>
    </div>
    <div class="modal-footer" style="dispaly: flex; justify-content: center;">
        <a href="{{ url('/checkout')}}"><button id="checkout-button">Checkout</button></a>
      </div>
    </div>
  </div>
</div>
