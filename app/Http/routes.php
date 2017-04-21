<?php

// Provisório
Route::get('/', function(){
    return view('index');
});

Route::group(['middleware'  =>  'cors'], function(){
    Route::get('/teste', function(){
        return \Response::json(\App\Models\Oferta::all());
    });
    
    Route::post('/cadastroTeste', function(){
        if (empty(\Request::all())) {
            return \Response::json('tá vazia tua requisição. Não falei pra tu colcoar valor no post? D:');
        } else {
            return \Response::json(\Request::all());
        }
    });
});


//-------- PARCEIRO -------

Route::get('/Parceiro/login', 'Parceiro\LoginController@getLogin');
Route::post('/Parceiro/login', 'Parceiro\LoginController@makeLogin');
Route::get('/Parceiro/logout', 'Parceiro\LoginController@logout');

Route::get('/Admin/login', 'Admin\LoginController@getLogin');
Route::post('/Admin/login', 'Admin\LoginController@makeLogin');
Route::get('/Admin/logout', 'Admin\LoginController@logout');

Route::group(['prefix' => 'Parceiro', 'middleware' => 'auth:parceiro'], function()
{
    // Url: /Parceiro
    Route::get('/', 'Parceiro\HomeController@index');
    Route::put('/atualizarDados', 'Parceiro\HomeController@atualizarDados');
    
    Route::group(['prefix'  => 'Oferta'], function(){
        // Url: /Parceiro/Ofertas/
        Route::get('/', 'Parceiro\OfertaController@getListarOferta');
        
        Route::get('/Cadastrar', 'Parceiro\OfertaController@getCadastrarOferta'); // Arrumar depois o endereço da url
        Route::post('/Cadastrar', 'Parceiro\OfertaController@cadastrarOferta');
        Route::get('/editar/{oferta}', 'Parceiro\OfertaController@getEditarOferta'); // Arrumar depois o endereço da url
        Route::put('/editar', 'Parceiro\OfertaController@updateOferta');
    });
    
    Route::group(['prefix' => 'Cupom'], function(){
        Route::get('/', 'Parceiro\CupomController@getListarCupom');
        Route::get('/Validar', 'Parceiro\CupomController@getValidarCupom'); // Arrumar depois o endereço da url
    });
});

// -------- ADMIN ------- 

Route::group(['prefix' => 'Admin', 'middleware' => 'auth:admin'], function(){
   
    Route::get('/', 'Admin\HomeController@index');
    // Route::get('/dados-pessoais', 'Admin\HomeController@getDados');
    
    Route::group(['prefix' => 'Parceiro'], function(){
        Route::get('/', 'Admin\ParceiroController@getListarParceiro');
        Route::get('/Cadastrar', 'Admin\ParceiroController@getCadastrarParceiro');
        Route::get('/{parceiro}','Admin\ParceiroController@getEditarParceiro'); // ARRUMAR URL DPS
        
    });
    
    Route::group(['prefix' => 'PontoTuristico'], function(){
        Route::get('/', 'Admin\PontoTuristicoController@getListarPonto');
        Route::get('/Cadastrar', 'Admin\PontoTuristicoController@getCadastrarPonto');
        Route::post('/Cadastrar', 'Admin\PontoTuristicoController@cadastrarPontoTuristico');
        Route::get('/{ponto}', 'Admin\PontoTuristicoController@getEditarPonto');
    });
    
     Route::group(['prefix' => 'Turista'], function(){
        Route::get('/','Admin\TuristaController@getListarTurista'); 
     });
    
});

// ------- API INTERNA -----------

Route::group(['prefix'  =>  'apiInterna'], function(){
    Route::put('/mudarStatusOferta', 'OfertaController@mudarStatusOferta');
    Route::delete('/deletarOferta', 'OfertaController@deletarOferta');
});