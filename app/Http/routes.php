<?php

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
        // Aqui vai o controller de oferta
        Route::get('/', 'Parceiro\OfertaController@getListarOferta');
        Route::get('/novo', 'Parceiro\OfertaController@getCadastrarOferta'); // Arrumar depois o endereço da url
        Route::get('/id', 'Parceiro\OfertaController@getEditarOferta'); // Arrumar depois o endereço da url
    });
    
    Route::group(['prefix' => 'Cupom'], function(){
        Route::get('/', 'Parceiro\CupomController@getListarCupom');
        Route::get('/Validar', 'Parceiro\CupomController@getValidarCupom'); // Arrumar depois o endereço da url
    });
});

// -------- ADMIN ------- 

Route::group(['prefix' => 'Admin'], function(){
   
    Route::get('/', 'Admin\HomeController@index');
    
    Route::group(['prefix' => 'Parceiro'], function(){
        Route::get('/Cadastro', 'Admin\ParceiroController@getCadastrarParceiro'); 
    });
    
    Route::group(['prefix' => 'PontoTuristico'], function(){
        Route::get('/Cadastro', 'Admin\PontoTuristicoController@getCadastrarPonto'); 
    });
    
});