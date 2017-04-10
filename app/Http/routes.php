<?php

    Route::group(['prefix' => 'Parceiro'], function()
    {
        // Url: /Parceiro
        Route::get('/', 'Parceiro\HomeController@index');
        
        Route::group(['prefix'  => 'Oferta'], function(){
            // Url: /Parceiro/Ofertas/
            // Aqui vai o controller de oferta
           Route::get('/', 'Parceiro\OfertaController@getCadastrarOferta');
           Route::get('/id', 'Parceiro\OfertaController@getEditarOferta'); // Arrumar depois o endereço da url
        });
    });
    
    