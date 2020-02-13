<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('teste');
});

/*Route::get('/teste', function () {
   echo "Basicão testado!";
});*/

//OU

//Route::view('/teste', 'teste');

//Redirecionamento automatico
//Route::redirect('/', 'teste');


Route::get('/noticia/algumacoisa', function () {
    echo "Titulo: titulo qualquer";
});

//Rotas com parametros
Route::get('noticia/{slug}/comentario/{id}', function($slug, $id){
    echo "Mostrando o comentário ".$id." da notícia ".$slug;
});

//Expressoes regulares para colocar um determinado tipo na rota.
//Pode colocar no route service o pattern que foi usado no id em route service provider em app/provider 
//para carregar o pattern que eu quero.

Route::get('/user/{name}', function($name){
    echo "Monstrando usuário de nome ".$name;
})->where('name', '[a-z]+');

Route::get('/user/{id}', function($id){
    echo "Monstrando usuário ID ".$id;
});

//------------------------------------------------------------
//Nome + Redirect

//Route::get('/config', function(){

    //Colocando nome na rota posso fazer as acoes do link e redirect.

    /*$link = route('info');
    echo "LINK: ".$link;*/

    //return redirect()->route('permissoes');

    //return view('config');
//})

/*Route::get('/config/info', function(){
    echo "Configurações INFO";
})->name('info');

Route::get('/config/permissoes', function(){
    echo "Configurações PERMISSÕES";
})->name('permissoes');*/

//----------------------------------------------------------
//Agrupando Rotas
//Sistema maior requer um agrupamento de rotas.

Route::prefix('/config')->group(function(){

    /*Route::get('/', function(){
        return view('config');
    });

    Route::get('info', function(){
        echo "Configurações INFO 2";
    });

    Route::get('permissoes', function(){
        echo "Configurações PERMISSÕES 2";
    });*/

    //Essas rotas podem ser feitas através de controllers como os a seguir.

    //Como o controller configcontroller esta dentro da pasta admin é preciso colocar o name espace dentro do controller
    //E também colocar o nome da pasta antes do controller.

    Route::get('/', 'Admin\ConfigController@index')->name('config.index')->middleware('auth');

    Route::post('/', 'Admin\ConfigController@index');

    Route::get('info', 'Admin\ConfigController@info');

    Route::get('permissoes', 'Admin\ConfigController@permissoes');
});

Route::resource('todo', 'todoController');

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');

Route::prefix('/tarefas')->group(function(){

    Route::get('/', 'TarefasController@list')->name('tarefas.list'); //Listagem de tarefas
    
    Route::get('add', 'TarefasController@add')->name('tarefas.add'); //Tela de adição
    Route::post('add', 'TarefasController@addAction'); //Ação de adição

    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); //Tela de edição
    Route::post('edit/{id}', 'TarefasController@editAction'); //Ação de edição

    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.del'); //Ação de deletar

    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done'); //Marcar resolvido/não.
});

//Laravel solicita que o Fallback seja a ultima rota a ser implementada.
Route::fallback(function(){
    return view('404');
});