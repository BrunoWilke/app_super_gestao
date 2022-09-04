@if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
    @method('PUT')
    @csrf
@else
    <form method="post" action="{{ route('cliente.store') }}">
    @csrf
@endif         
    <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta"/>
    {{$errors->has('nome') ? $errors->first('nome') : ""}}

    <button type="submit" class="borda-preta">{{isset($cliente->id) ? "Salvar Alterações " : "Cadastrar "}}</button>
</form>
