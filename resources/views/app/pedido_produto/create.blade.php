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
        {{date_default_timezone_set('America/Sao_Paulo')}}
        <h4>Detalhes do pedido</h4>
        <p>Id do Pedido: {{ $pedido->id }}</p>
        <p>Id do Cliente: {{ $pedido->cliente_id }}</p>
        <p>Hora atual: {{ date('h:i:s') }}</p>
        <div style="width:30%; margin-left:auto; margin-right:auto;"> 
            <h4>Itens do Pedido</h4>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Data de Criação</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido->produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->pivot->quantidade}}</td>
                        <td>{{$produto->pivot->created_at}}</td>
                        <td>
                            <form id="form_{{$pedido->id}}_{{$produto->id}}" action="{{ route('pedido-produto.destroy',['pedido' => $pedido->id, 'produto' => $produto->id]) }}" method="post">
                                @method('DELETE')
                                @csrf    
                                <a href="#"onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()">Excluir</a> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent   
        </div>
    </div>
</div> 
    
@endsection