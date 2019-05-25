<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    Route::get('/', 'HomeController@index');

    return $request->user();
});

Route::group(array('prefix' => 'v0'), function(){
    Route::get('/', function () {
        return response()->json([
            'mensagens' => ['API - SELEÇÃO LAIS'],
            'status' => 200,
            'dados' => []
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | Profissionais
    |--------------------------------------------------------------------------
    */
    Route::group(array('prefix' => 'profissionais'), function(){
        Route::post('store', 'API\ProfissionaisController@store')->name("cadastrar_profissional");
        Route::post('update/{id}', 'API\ProfissionaisController@update')->name("atualizar_profissional");
        Route::get('/', 'API\ProfissionaisController@index')->name("listar_profissional");
        Route::get('destroy/{id}', 'API\ProfissionaisController@destroy')->name("deletar_profissional");
        Route::get('show/{id}', 'API\ProfissionaisController@show')->name("detalhar_profissional");
    });


//    Route::resource('profissionais','API\ProfissionaisController');

});

