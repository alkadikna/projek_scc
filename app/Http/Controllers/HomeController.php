<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //



    public function index(){
        $data = product::all();
        if(auth()->check()){
            $user = Auth::user();
            $count = cart::where('email',$user->email)->count();
            $cart = cart::where('email',$user->email)->get();
            return view('user.home',compact('data','user','count','cart'));
        }else{
            return view('user.home',compact('data'));
        }
        
    }

    // public function search(Request $request){
    //     $search = $request->search;
    //     $data=product::where('title', 'Like','%'.$search.'%')->get();
    //     if(auth()->check()){
    //         $user = Auth::user();
    //         $count = cart::where('email',$user->email)->count();
    //         $cart = cart::where('email',$user->email)->get();
    //         return view('user.search',compact('data','user','count','cart'));
    //     }else{
    //         return view('user.search',compact('data'));
    //     }
    // }

    public function search(Request $request, $category = null){
        $search = $request->search;
        $query = Product::query();

        if ($category) {
            $query->where('category',$category);
        }

        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }

        $data = $query->get();

        if (auth()->check()) {
            $user = Auth::user();
            $count = Cart::where('email', $user->email)->count();
            $cart = Cart::where('email', $user->email)->get();
            return view('user.search', compact('data', 'user', 'count', 'cart', 'category'));
        } else {
            return view('user.search', compact('data', 'category'));
        }
    }
    

    // public function category($category){
    //     $data=product::where('category', 'Like',$category)->get();
    //     if(auth()->check()){
    //         $user = Auth::user();
    //         $count = cart::where('email',$user->email)->count();
    //         $cart = cart::where('email',$user->email)->get();
    //         return view('user.search',compact('data','user','count','cart'));
    //     }else{
    //         return view('user.search',compact('data'));
    //     }
    // }

    public function detail($id){
        $data=product::find($id);
        if(auth()->check()){
            $user = Auth::user();
            $count = cart::where('email',$user->email)->count();
            $cart = cart::where('email',$user->email)->get();
            return view('user.product',compact('data','user','count','cart'));
        }else{
            return view('user.product',compact('data'));
        }
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){

            $user = auth()->user();
            $product = product::find($id);
            $cart = cart::where('email', $user->email)->where('product_title', $product->title)->first();

            if ($cart) {
            // Jika sudah ada di keranjang, tambahkan kuantitasnya
            $cart->quantity += $request->quantity;
            } else {
            // Jika produk belum ada di keranjang, buat item keranjang baru
            $cart = new cart;
            $cart->quantity = $request->quantity;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->product_title = $product->title;
            }   

            $cart->price = number_format($product->price * $cart->quantity, 2, '.', '');
            $cart->save();

            return redirect()->back()->with('success', 'Item berhasil dimasukkan ke keranjang');
        }
        else{
            return redirect('login');
        }

    }

    public function checkout(){
        if(Auth::id()){
            $user = Auth::user();
            $count = cart::where('email',$user->email)->count();
            $cart = cart::where('email',$user->email)->get();

            return view('user.checkout',compact('count', 'cart'));
        }
        else{
            return redirect('login');
        }
        
    }

    public function deletecart($id){
        $data=cart::find($id);

        $data->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }

    public function updatecart(Request $request, $id){
        $item = Cart::find($id);
        $unitPrice = ($item->price)/($item->quantity);
        $item->quantity = $request->quantity;
        $item->price = number_format(($item->quantity)*$unitPrice, 2, '.', '');
        $item->save();

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui');
    }

    public function order(Request $request)
{
    $user = Auth::user();
    $email = $user->email;
    $paymentMethod = $request->input('payment-method');

    $cartItems = DB::table('carts')->where('email', $email)->get();

    $totalPrice = $cartItems->sum('price');

    $items = $cartItems->map(function ($item) {
        return [
            'product_title' => $item->product_title,
            'quantity' => $item->quantity,
            'price' => $item->price,
        ];
    })->toArray();

    $order = new Order();
    $order->user_id = $user->id;
    $order->email = $email;
    $order->payment_method = $paymentMethod;
    $order->items = $items; 
    $order->total_price = $totalPrice;
    $order->save();

    DB::table('carts')->where('email', $email)->delete();

    return redirect('home')->with('success', 'Order telah dibuat');
}


    public function orderHistory(){
        $user = Auth::user();
        $count = cart::where('email',$user->email)->count();
        $cart = cart::where('email',$user->email)->get();
        $orders = Order::where('user_id', $user->id)->get();

        return view('user.history', compact('orders'));
    }

    public function detailHistory($id){
        $user = Auth::user();
        $count = Cart::where('email', $user->email)->count();
        $cart = Cart::where('email', $user->email)->get();
        $orders = Order::where('user_id', $user->id)->find($id);

        return view('user.detailHistory', compact('orders'));
    }

}
