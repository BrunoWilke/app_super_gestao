<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        
        /*
        $contato = new SiteContato;
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        
        $contato = new SiteContato;
        $contato->create($request->all());
        */
        /*$motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ]; ---- substituimos esses dados por dados puxados da base de dados*/
        
        $motivo_contatos = MotivoContato::all(); //puxa todos os registros desse model. Na view a gente seleciona a informação quer
        
        return view('site.contato',['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(Request $request){
        $request->validate(
            [
                'nome' => 'required|min:3|max:40|unique:site_contatos',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000',
            ],
            [
             'required' =>'O campo :attribute precisa ser preenchido',
             
             'nome.min' => 'O campo nome deve ter no mínimo 3 carcateres',
             'nome.max' => 'O campo nome deve ter no máximo 40 carcateres',
             'nome.unique' => 'O este nome já exite no nosso banco de dados',
             
             'email.email' => 'O email informado náo é valido',
             
             'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres' 
            ]
            
    
    
    );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
