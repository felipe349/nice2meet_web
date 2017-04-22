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
    
    Route::get('/getOfertasPorLocalizacao/{lat}/{lng}', function($lat, $lng){
        return $lat;
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

// ----------------- Parceiro
Route::group(['prefix' => 'Parceiro', 'middleware' => 'auth:parceiro'], function()
{
    // Url: /Parceiro
    Route::get('/', 'Parceiro\HomeController@index');
    Route::put('/atualizarDados', 'Parceiro\HomeController@update');
    
    // Ofertas
    Route::group(['prefix'  => 'Oferta'], function(){
        // Url: /Parceiro/Ofertas/
        Route::get('/', 'Parceiro\OfertaController@index');
        
        Route::get('/Cadastrar', 'Parceiro\OfertaController@create');
        Route::post('/Cadastrar', 'Parceiro\OfertaController@store');
        
        Route::get('/editar/{oferta}', 'Parceiro\OfertaController@edit');
        Route::put('/editar', 'Parceiro\OfertaController@update');
    });
    
    // Cupom
    Route::group(['prefix' => 'Cupom'], function(){
        Route::get('/', 'Parceiro\CupomController@index');
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
        Route::get('/', 'Admin\ParceiroController@index');
        Route::get('/Cadastrar', 'Admin\ParceiroController@create');
        Route::get('/{parceiro}','Admin\ParceiroController@edit'); // ARRUMAR URL DPS
        
    });
    
    // Pontos turísticos
    Route::group(['prefix' => 'PontoTuristico'], function(){
        Route::get('/', 'Admin\PontoTuristicoController@index');
        Route::get('/Cadastrar', 'Admin\PontoTuristicoController@create');
        Route::post('/Cadastrar', 'Admin\PontoTuristicoController@store');
        Route::get('/{ponto}', 'Admin\PontoTuristicoController@edit');
        Route::put('/{ponto}', 'Admin\PontoTuristicoController@update');
    });
    
    // Turistas
    Route::group(['prefix' => 'Turista'], function(){
        Route::get('/','Admin\TuristaController@index'); 
    });
    
    // Ofertas
    Route::group(['prefix'  =>  'Ofertas'], function(){
        Route::get('/', 'Admin\OfertaController@index');
        
        // Um admin pode cadastrar ofertas?
        // Route::get('/Cadastrar', 'Admin\OfertaController@getCadastrarParceiro');
    });
    
});

// ------- API INTERNA -----------
Route::group(['prefix'  =>  'apiInterna'], function(){
    // Ofertas
    Route::put('/mudarStatusOferta', 'OfertaController@update');
    Route::delete('/deletarOferta', 'OfertaController@destroy');
    
    // Pontos Turísticos
    // Route::put('/mudarStatusPontoTuristico', 'PontoTuristicoController@mudarStatusPontoTuristico');
    // Route::delete('/deletarPontoTuristico', 'PontoTuristicoController@deletarPontoTuristico');
    
});