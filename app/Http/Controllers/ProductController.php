<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product', compact('product'));
    }

    public function addToCart(Request $request, $id, $continue=null)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        if($continue === '0'){
            return redirect('products')->with('success', 'Produkt dodano do koszyka');
        }else{
        return redirect(route('shoppingCart'));
        }
    }

    public function getCart()
    {
        if(!Session::has('cart')){
            return view('shopping-cart', ['products' =>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        return view('shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if(!Session::has('cart')){
            return view('shopping-cart', ['products' =>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('checkout', compact('total'));
    }

    public function postCheckout()
    {
        
    }
}
