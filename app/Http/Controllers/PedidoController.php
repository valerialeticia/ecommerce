<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Pedido;

class PedidoController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_zipcode' => 'required',
            'metodo_pagamento' => 'required',
        ]);

        $pedido= new Pedido();
        $pedido->pedido_id = uniqid('OrderNumber-');

        $pedido->shipping_fullname = $request->input('shipping_fullname');
        $pedido->shipping_state = $request->input('shipping_state');
        $pedido->shipping_city = $request->input('shipping_city');
        $pedido->shipping_address = $request->input('shipping_address');
        $pedido->shipping_phone = $request->input('shipping_phone');
        $pedido->shipping_zipcode = $request->input('shipping_zipcode');

        if(!$request->has('billing_fullname')) {
            $pedido->billing_fullname = $request->input('shipping_fullname');
            $pedido->billing_state = $request->input('shipping_state');
            $pedido->billing_city = $request->input('shipping_city');
            $pedido->billing_address = $request->input('shipping_address');
            $pedido->billing_phone = $request->input('shipping_phone');
            $pedido->billing_zipcode = $request->input('shipping_zipcode');
        }else {
            $pedido->billing_fullname = $request->input('billing_fullname');
            $pedido->billing_state = $request->input('billing_state');
            $pedido->billing_city = $request->input('billing_city');
            $pedido->billing_address = $request->input('billing_address');
            $pedido->billing_phone = $request->input('billing_phone');
            $pedido->billing_zipcode = $request->input('billing_zipcode');
        }

        $pedido->grand_total = \Cart::session(auth()->id())->getTotal();

        $pedido->item_qty = \Cart::session(auth()->id())->getContent()->count();

        $pedido->user_id = auth()->id();

        if (request('metodo_pagamento') == 'paypal') {
            $pedido->metodo_pagamento = 'paypal';
        }

        $pedido->save();

        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach($cartItems as $item) {
            $pedido->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
        }

        //redirecionamento para o paypal
        if(request('metodo_pagamento') == 'paypal') {
            //redirect to paypal
            return redirect()->route('paypal.checkout', $pedido->id);

        }

        //limpar Carrinho
        \Cart::session(auth()->id())->clear();

        return redirect()->route('home')->withMessage('Pedido Realizado');
    }
}