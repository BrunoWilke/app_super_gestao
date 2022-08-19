{{$slot}}
<form method="post" action="{{ route('site.contato')}}">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$classe}}">
    {{$errors->has('nome') ? $errors->first('nome') : ''}}
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$classe}}">
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$classe}}" style="">
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $value)
            <option value="{{$value->id}}" {{ old('motivo_contatos_id') == $value->id ? 'selected' : '' }}>{{$value->motivo_contato}}</option>    
        @endforeach
    </select>
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <br>
    <textarea name="mensagem" class="{{$classe}}">{{ (old('mensagem') != '') ? (old('mensagem')) : 'Preencha aqui a sua mensagem' }}</textarea>
    <div style="background:red;">
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    </div>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
    @if($errors->any())   
        <div style="position:absolute; top:0px; left:0px; width:100%; background:red;">
            <pre>
                @foreach($errors->all() as $erro)
                    {{$erro}}
                @endforeach
            </pre>
        </div>
    @endif
</form>