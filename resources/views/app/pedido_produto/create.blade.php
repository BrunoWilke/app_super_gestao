@extends('app.layouts.basico')
@section('titulo','Pedido Produto')
@section('conteudo')

<div class="conteudo-pagina">
    
    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
    </div>
    
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>    
    </div>
    
    <div class="informacao-pagina">
        <h4>Detalhes do pedido</h4>
        <p>Id do Pedido: {{ $pedido->id }}</p>
        <p>Id do Cliente: {{ $pedido->cliente_id }}</p>
        <div style="width:30%; margin-left:auto; margin-right:auto;"> 
            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent   
        </div>
    </div>
</div> 
    
@endsection