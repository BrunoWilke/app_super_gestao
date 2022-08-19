<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1,int $p2){
       //echo "a soma de $p1 mais $p2 é ".($p1+$p2);
       //return view('site.teste',['x' => $p1,'y' => $p2]);
       //return view('site.teste',compact('p1','p2'));
        return view('site.teste') -> with('xyz', $p1) ->with('zzz',$p2);                                          
    }
}
