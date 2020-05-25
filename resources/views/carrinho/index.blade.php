@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Meu carrinho</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itensCarrinho as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</td><!-- deixando o price dinamico-->
                    <td>
                    <form action="">
                        <input name="quantity" type="number" value="{{$item->quantity}}">
                        <input type="submit" value="save">
                    </form>
                    </td>
                    <td><button type="button" class="btn btn-dark">Dark</button></td>
                </tr>
            @endforeach
           
        </tbody>
    </table>


</div>
@endsection