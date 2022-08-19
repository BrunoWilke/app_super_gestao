<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //incluindo registros instanciando um objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor100';
        $fornecedor->site = 'Fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br$fornecedor->';
        $fornecedor->save();

        //outra forma de incluir registros é o create, mas esse precisa do atributo fillable la no model, na classe
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf'  => 'RS',
            'email' => 'contato@fornecedor200.com'
        ]);

        //incluindo registros usando o método insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf'  => 'RN',
            'email' => 'contato@fornecedor300.com'
        ]);
    }
}
