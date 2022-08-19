<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    public function principal(){
        /*$motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ]; ---- substituimos esses dados por dados puxados da base de dados*/
       
        $motivo_contatos = MotivoContato::all(); //puxa todos os registros desse model. Na view a gente seleciona a informação quer 
        
        return view('site.principal',['motivo_contatos' => $motivo_contatos]);
    }
}
