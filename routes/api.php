<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('/class','Api\ClassNameController'); //or,
// Route::get('/class','Api\ClassNameController@index');
// Route::post('/class','Api\ClassNameController@store');
// Route::delete('/class/{id}','Api\ClassNameController@destroy');
// Route::get('/class/{id}','Api\ClassNameController@show');
// Route::PATCH('/class/{id}','Api\ClassNameController@update');


