<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

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

    public function search(Request $request){
        $search = $request->search;
        $data=product::where('title', 'Like','%'.$search.'%')->get();
        if(auth()->check()){
            $user = Auth::user();
            $count = cart::where('email',$user->email)->count();
            $cart = cart::where('email',$user->email)->get();
            return view('user.search',compact('data','user','count','cart'));
        }else{
            return view('user.search',compact('data'));
        }
    }

    public function category($category){
        $data=product::where('category', 'Like',$category)->get();
        if(auth()->check()){
            $user = Auth::user();
            $count = cart::where('email',$user->email)->count();
            $cart = cart::where('email',$user->email)->get();
            return view('user.search',compact('data','user','count','cart'));
        }else{
            return view('user.search',compact('data'));
        }
    }

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
            // Jika produk sudah ada di keranjang, tambahkan kuantitasnya
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
        $item->quantity = $request->quantity;
        $item->save();

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui');
    }

    public function order(){
        $user = Auth::user();
        $email = $user->email;

        DB::table('carts')->where('email', $email)->delete();

        return redirect('home')->with('success', 'Order telah dibuat');

    }



}
