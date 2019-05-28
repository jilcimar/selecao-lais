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
        Route::post('store', 'API\ProfissionaisController@store')->name('api_store');
        Route::put('update/{id}', 'API\ProfissionaisController@update');
        Route::get('/', 'API\ProfissionaisController@index')->name('api_index');
        Route::get('destroy/{id}', 'API\ProfissionaisController@destroy')->name('api_destroy');
        Route::get('show/{id}', 'API\ProfissionaisController@show');
        Route::post('delete/all', 'API\ProfissionaisController@destroy_all')->name('destroy_all_api');

    });

    /*
    |--------------------------------------------------------------------------
    | Indicadores
    |--------------------------------------------------------------------------
    */
    Route::group(array('prefix' => 'indicadores'), function(){
        Route::get('vinculo', 'API\IndicadorController@vinculo_empregaticio')->name('api_indicador_vinculo');
        Route::get('tipo', 'API\IndicadorController@tipo')->name('api_indicador_tipo');
    });

    /*
   |--------------------------------------------------------------------------
   | Tipo
   |--------------------------------------------------------------------------
   */
    Route::get('tipo', 'API\ProfissionaisController@tipo');

    /*
    |--------------------------------------------------------------------------
    | Vinculo
    |--------------------------------------------------------------------------
    */
    Route::get('vinculo', 'API\ProfissionaisController@vinculo');

    /*
    |--------------------------------------------------------------------------
    | CBO
    |--------------------------------------------------------------------------
    */
    Route::get('cbo', 'API\ProfissionaisController@cbo');


//    Route::resource('profissionais','API\ProfissionaisController');

});

