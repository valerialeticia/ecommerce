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

    //update carrinho
    public function atualizarProduto($itemId) {
        \Cart::session(auth()->id())->update($itemId,[
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);
        return back();
    }


    //delete carrinho
    public function deletarProduto($itemId) {
        \Cart::session(auth()->id())->remove($itemId);
        return back(); //retornar para a msm pagina
    }
}
