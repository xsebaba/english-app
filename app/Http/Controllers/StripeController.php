<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Mail\PurchaseMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{

    public function postCheckout()
    {
        if(!Session::has('cart')){
            return view('shopping-cart', ['products' =>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        
        $lineItems = [];
        foreach($cart->items as $product)
        {
            $totalPrice =+ $product['price'];
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'pln',
                    'product_data' => [
                        'name' => $product['item']['name']
                        ],
                    'unit_amount' => $product['price']*100,
                ],
                'quantity' => $product['qty'],
            ];
        };

        $stripe = new \Stripe\StripeClient(config('stripe.sk'));

        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
        'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $totalPrice;
        $order->session_id = $checkout_session->id;
        $order->save();

        return redirect()->away($checkout_session->url);
    }

    public function success(Request $request)
    {   
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $sessionId = $request->get('session_id');
        
        Session::forget('cart');

        try{
            $checkout_session = \Stripe\Checkout\Session::retrieve($sessionId);
            if(!$checkout_session){
                throw new NotFoundHttpException;
            }
            $customer = $checkout_session->customer_details;
            $order = Order::where('session_id', $checkout_session->id)->where('status', 'unpaid')->first();
            if(!$order){
                
                throw new NotFoundHttpException;
            }
            
            $order->status = 'paid';
            $order->customer = $customer->name;
            $order->email = $customer->email;
            $order->save();
            
            Mail::to($order->email)->send(new PurchaseMail());

            return view('success', compact('customer'))->with('success', 'Zakup został opłacony. Sprawdź swoją skrzynkę email!');
        }
        catch(\Exception $e){
        
            throw new NotFoundHttpException;
        }
        
        return view('success')->with('success', 'Skontaktuj się w sprawie zakupów ze sklepem. Coś mogło być nie tak');
    }


    public function cancel()
    {
        return redirect()->route('products')->with('success', 'Nie udało się sfinalizować zakupu. Twoje zamówienie jest nieopłacone i zostanie usunięte.');
    }

    public function webhook()
    {
        
    }
}
