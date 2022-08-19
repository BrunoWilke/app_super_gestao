<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou Senha incorreto';
        }
        elseif($request->get('erro') == 2){
            $erro = 'Faça o Login para acessar a página Solicitada';
        }
        //$erro = $request->get('erro');
        return view('site.login',['titulo' => 'Login', 'erro' => $erro]) ;
    }
    
    public function autenticar(Request $request){

        //validando campos
        $regras = [
            'usuario'=>'email',
            'senha'=> 'required'
        ];
        $feedback = [
            'usuario.email' => 'Um usuário(email) válido deve ser informado',
            'senha.required' => 'Informe sua Senha'
        ];
        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $senha = $request->input('senha');

        //confere existencia do usuario 
        $user = new User();
        $usuario = $user->where('email','=',$email)->where('password','=',$senha)->get()->first();
        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        }
        else{
            echo 'Usuario nao existe';
            return redirect()->route('site.login',['erro' => 1]);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
