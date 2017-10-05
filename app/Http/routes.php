<?php
// Provisório
Route::get('/', function(){
    return view('index');
});
Route::group(['prefix'    =>  'api'], function(){
    // Route::post('/cadastroTurista', 'Api\TuristaController@store');
    // Route::post('/login', 'Api\TuristaController@postLogin');
    
    // Route::group(['middleware' => 'jwt-auth'], function () {
    // 	Route::post('get_user_details', 'Api\TuristaController@get_user_details');
    // });
    
    Route::post('auth/login', 'Api\TuristaController@authenticate');
    Route::post('cadastroTurista', 'Api\TuristaController@store');
    
    Route::post('pontoTuristico', 'Api\PontoTuristicoController@getPontosTuristicos');
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
        Route::put('/Validar', 'Parceiro\CupomController@validarCupom');
    });
});
// -------- ADMIN ------- 
Route::group(['prefix' => 'Admin'], function()
{
    // Url: /Admin
    Route::get('/', 'Admin\HomeController@index');
    
    // Parceiros
    Route::group(['prefix' => 'Parceiro'], function(){
        Route::get('/', 'Admin\ParceiroController@index');
        Route::get('/Cadastrar', 'Admin\ParceiroController@create');
        Route::post('/Cadastrar', 'Admin\ParceiroController@store');
        
        Route::get('/{parceiro}','Admin\ParceiroController@edit');
        Route::put('/{parceiro}','Admin\ParceiroController@update');
        
    });
    
    // Pontos turísticos
    Route::group(['prefix' => 'PontoTuristico'], function(){
        Route::get('/', 'Admin\PontoTuristicoController@index');
        Route::get('/Cadastrar', 'Admin\PontoTuristicoController@create');
        Route::post('/Cadastrar', 'Admin\PontoTuristicoController@store');
        Route::get('/{ponto}', 'Admin\PontoTuristicoController@edit');
        Route::put('/{ponto}', 'Admin\PontoTuristicoController@update');
        Route::get('/deletarPonto/{ponto}', 'Admin\PontoTuristicoController@destroy');
    });
    
    // Quiz
    Route::group(['prefix' => 'Quiz'], function(){
        Route::get('/', 'Admin\QuizController@index');
        Route::get('/Cadastrar', 'Admin\QuizController@create');
        Route::post('/Cadastrar', 'Admin\QuizController@store');
        Route::get('/{quiz}', 'Admin\QuizController@edit');
        Route::put('/{quiz}', 'Admin\QuizController@update');
        Route::get('/deletarQuiz/{quiz}', 'Admin\QuizController@destroy')->name('teste');
    });  
    
    // Turistas
    Route::group(['prefix' => 'Turista'], function(){
        Route::get('/','Admin\TuristaController@index');
        
        Route::get('/{turista}', 'Admin\TuristaController@edit');
        Route::put('/{turista}', 'Admin\TuristaController@update');
    });
    
    // Ofertas
    Route::group(['prefix'  =>  'Ofertas'], function(){
        Route::get('/', 'Admin\OfertaController@index');
        
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