<?php

    Route::group(['prefix' => 'Parceiro'], function()
    {
        // Url: /Parceiro
        Route::get('/', 'Parceiro\HomeController@index');
        
        Route::get('/Login', 'Parceiro\HomeController@getLogin'); // NAO SEI AONDE FICA
        
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
    
    
    
    