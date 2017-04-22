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


//-------- LOGIN -------

Route::group(['prefix'  =>  '/Parceiro'], function(){
    Route::get('/login', 'Parceiro\LoginController@getLogin');
    Route::post('/login', 'Parceiro\LoginController@makeLogin');
    Route::get('/logout', 'Parceiro\LoginController@logout');
});

Route::group(['prefix'  =>  '/Admin'], function(){
    Route::get('/login', 'Admin\LoginController@getLogin');
    Route::post('/login', 'Admin\LoginController@makeLogin');
    Route::get('/logout', 'Admin\LoginController@logout');
});

Route::group(['prefix' => 'Parceiro', 'middleware' => 'auth:parceiro'], function()
{
    // Url: /Parceiro
    Route::get('/', 'Parceiro\HomeController@index');
    Route::put('/atualizarDados', 'Parceiro\HomeController@atualizarDados');
    
    // Ofertas
    Route::group(['prefix'  => 'Oferta'], function(){
        // Url: /Parceiro/Ofertas/
        Route::get('/', 'Parceiro\OfertaController@getListarOferta');
        
        Route::get('/Cadastrar', 'Parceiro\OfertaController@getCadastrarOferta');
        Route::post('/Cadastrar', 'Parceiro\OfertaController@cadastrarOferta');
        
        Route::get('/editar/{oferta}', 'Parceiro\OfertaController@getEditarOferta');
        Route::put('/editar', 'Parceiro\OfertaController@updateOferta');
    });
    
    // Cupom
    Route::group(['prefix' => 'Cupom'], function(){
        Route::get('/', 'Parceiro\CupomController@getListarCupom');
        Route::get('/Validar', 'Parceiro\CupomController@getValidarCupom');
    });
});

// -------- ADMIN ------- 

Route::group(['prefix' => 'Admin', 'middleware' => 'auth:admin'], function(){
    // Url: /Admin
    
    Route::get('/', 'Admin\HomeController@index');
    // Route::get('/dados-pessoais', 'Admin\HomeController@getDados');
    
    // Parceiros
    Route::group(['prefix' => 'Parceiro'], function(){
        Route::get('/', 'Admin\ParceiroController@getListarParceiro');
        Route::get('/Cadastrar', 'Admin\ParceiroController@getCadastrarParceiro');
        Route::get('/{parceiro}','Admin\ParceiroController@getEditarParceiro'); // ARRUMAR URL DPS
        
    });
    
    // Pontos turísticos
    Route::group(['prefix' => 'PontoTuristico'], function(){
        Route::get('/', 'Admin\PontoTuristicoController@getListarPonto');
        Route::get('/Cadastrar', 'Admin\PontoTuristicoController@getCadastrarPonto');
        Route::post('/Cadastrar', 'Admin\PontoTuristicoController@cadastrarPontoTuristico');
        Route::get('/{ponto}', 'Admin\PontoTuristicoController@getEditarPonto');
        Route::put('/{ponto}', 'Admin\PontoTuristicoController@updatePontoTuristico');
    });
    
    // Turistas
    Route::group(['prefix' => 'Turista'], function(){
        Route::get('/','Admin\TuristaController@getListarTurista'); 
    });
    
    // Ofertas
    Route::group(['prefix'  =>  'Ofertas'], function(){
        Route::get('/', 'Admin\OfertaController@getListarOfertas');
        
        Route::get('/Cadastrar', 'Admin\OfertaController@getCadastrarParceiro');
    });
    
});

// ------- API INTERNA -----------
Route::group(['prefix'  =>  'apiInterna'], function(){
    // Ofertas
    Route::put('/mudarStatusOferta', 'OfertaController@mudarStatusOferta');
    Route::delete('/deletarOferta', 'OfertaController@deletarOferta');
    
    // Pontos Turísticos
    // Route::put('/mudarStatusPontoTuristico', 'PontoTuristicoController@mudarStatusPontoTuristico');
    // Route::delete('/deletarPontoTuristico', 'PontoTuristicoController@deletarPontoTuristico');
    
});