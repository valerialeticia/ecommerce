@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary text-center mb-5">Informações para finalização de compra</h3>
    
    <form action="{{route('pedido.store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputNome">Nome</label>
            <input type="text" name="shipping_fullname" class="form-control" id="inputNome">
            </div>
            <div class="form-group col-md-6">
            <label for="inputEstado">Estado</label>
            <input type="text" name="shipping_state" class="form-control" id="inputEstado">
            </div>
        </div>
        <div class="form-group">
            <label for="inputCidade">Cidade</label>
            <input type="text" name="shipping_city" class="form-control" id="inputCidade">
        </div>
        <div class="form-group">
            <label for="inputEndereco">Endereço</label>
            <input type="text" name="shipping_address" class="form-control" id="inputEndereco">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputTelefone">Telefone</label>
            <input type="text" name="shipping_phone" class="form-control" id="inputTelefone">
            </div>
            <div class="form-group col-md-4">
            <label for="inputCep">CEP</label>
            <input type="text" name="shipping_zipcode" class="form-control" id="inputCep">
            </div>
        </div>

        <h4>Pagamento</h4>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="metodo_pagamento" value="dinheiro">
                Dinheiro
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="metodo_pagamento" value="paypal">
                Paypal
            </label>

        </div>


        <button type="submit" class="btn btn-primary mt-4">Enviar</button>
    </form>
</div>

@endsection()