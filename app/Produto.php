<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe');
        //Vai olhar pra tabela produto_detalhes(ele sabe a tabela certa se for nomeado no padrao certo)
        //e vai ver se tem algum fk com um id produto. Por isso o $this
    }
}
