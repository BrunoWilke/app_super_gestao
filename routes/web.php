<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso!';
});*/
//se dentro do method get tiver um string o sistema vai executar um controlador e uma ação que esteja dentro desse controlador que seve ser separado por um @
// os names da routes funcionam como apelidos e sao utilizados a atraves do helper do laravel. Nao é possivel digitar o nome da rota na url do navegar. Lá, deve ser utilizado o caminho absoluto
//usando ->group é possível criar uma separação com paginas que serão acessadas apenas por certo grupo de pessoas 
//o nome da rota é passo la na viu nas ancoras ao invés do caminho absoluto da rota. isso garante que a ancora seja valida mesmo se o caminho absoluto mudar
Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function(){
    //nav menu
    //Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    
    //fornecedor
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //produto
    Route::resource('produto', 'ProdutoController');

    //produto detalhes
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    Route::resource('cliente', 'ClienteController');

    Route::resource('pedido', 'PedidoController');

    Route::resource('pedido-produto', 'PedidoProdutoController');

});

Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('teste');

/*
Route::get('/rota1', function(){
    echo "rota1";
})->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1'); //fazendo redirecionamento de rotas no controller

})->name('site.rota2');

//Route::redirect('rota2','rota1'); - uma forma de se redirecionar uma rota usando o redirect*/

Route::fallback(function(){
    echo 'a rota acessada nao exite. <a href="'.route('site.index').'">Clique aqui</a> para voltar para a pagina inicial';
});
/* Rota de Teste
Route::get(
    '/contato/{nome}/{categoria_id}',
    function(string $nome,
    int $categoria_id = 1) {
        echo "estamos aqui:". $nome. "-". $categoria_id;
    }
)->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');*/ //chamamos isso de expressões regulares
//garante que a rota passada atenda a algumas exigências
//para tornar os parametros das rotas opcionais temos que colocar um ponto de interrogação depois do colchetes 


/* além dos verbos http get, temos

post
put
patch
delete
options

*/
