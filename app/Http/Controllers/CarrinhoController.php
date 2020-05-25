<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class CarrinhoController extends Controller 
{
    //function para adicionar produto ao carrinho
    public function adicionarProduto(Produto $produto) {
        \Cart::session(auth()->id())->add(array(
            'id' => $produto->id,
            'name' => $produto->name,
            'price' => $produto->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $produto
        ));
        return  redirect()->route('carrinho.index');
    }
    //"listar" os produtos adicionados no carrinho
    public function index() {
        $itensCarrinho = \Cart::session(auth()->id())->getContent();
        return view('carrinho.index', compact('itensCarrinho'));
    }

}
