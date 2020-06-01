@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Produtos</h2>
    @foreach ($produtos as $produto)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $produto->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $produto->description }}</h6>
                <p class="card-text">{{ $produto->price }}</p>
                <a href="{{route('carrinho.add', $produto->id)}}" class="card-link">Adicionar carrinho</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
