<?php

// Provisório
// Route::get('/', 'Parceiro\LoginController@getLogin');

//-------- PARCEIRO -------

Route::get('/Parceiro/login', 'Parceiro\LoginController@getLogin');
Route::post('/Parceiro/login', 'Parceiro\LoginController@makeLogin');
Route::get('/Parceiro/logout', 'Parceiro\LoginController@logout');

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
    Route::get('/Login','Admin\LoginController@getLogin');
    Route::get('/Dados', 'Admin\HomeController@getDados');
    
    Route::group(['prefix' => 'Parceiro'], function(){
        Route::get('/Cadastro', 'Admin\ParceiroController@getCadastrarParceiro'); 
        Route::get('/ID','Admin\ParceiroController@getEditarParceiro'); // ARRUMAR URL DPS
        Route::get('/', 'Admin\ParceiroController@getListarParceiro');
    });
    
    Route::group(['prefix' => 'PontoTuristico'], function(){
        Route::get('/Cadastro', 'Admin\PontoTuristicoController@getCadastrarPonto');
        Route::get('/ID', 'Admin\PontoTuristicoController@getEditarPonto');
        Route::get('/', 'Admin\PontoTuristicoController@getListarPonto');
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