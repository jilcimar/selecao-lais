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
        Route::post('store', 'API\ProfissionaisController@store');
        Route::put('update/{id}', 'API\ProfissionaisController@update');
        Route::get('/', 'API\ProfissionaisController@index');
        Route::get('destroy/{id}', 'API\ProfissionaisController@destroy');
        Route::get('show/{id}', 'API\ProfissionaisController@show');
    });

    /*
    |--------------------------------------------------------------------------
    | Indicadores
    |--------------------------------------------------------------------------
    */
    Route::group(array('prefix' => 'indicadores'), function(){
        Route::get('vinculo', 'API\IndicadorController@vinculo_empregaticio');
        Route::get('tipo', 'API\IndicadorController@tipo');
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

