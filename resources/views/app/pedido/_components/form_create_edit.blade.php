@if(isset($pedido->id))
    <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
    @method('PUT')
    @csrf
@else
    <form method="post" action="{{ route('pedido.store') }}">
    @csrf
@endif         
    <select name="cliente_id">
        <option>-- Selecione um Cliente --</option>
        @foreach ( $clientes as $cliente )
            <option value="{{ $cliente->id}}" {{  ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>   
        @endforeach
    </select>
    {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ""}}
    <button type="submit" class="borda-preta">{{isset($pedido->id) ? "Salvar Alterações " : "Cadastrar "}}</button>
</form>
