<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::group(
    [
        'namespace'=>'App\Http\Controllers',
        'middleware'=>'api'
    ],function(){

        Route::group([
                'prefix' => 'auth'
        ],
         function(){

            Route::post('/register', 'auth@register');
            Route::post('/login', 'auth@login');

         }
        );

        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();
        });

        Route::group(
            [
                'prefix' => 'service/group'
            ],
            function () {
                Route::get('/', 'ServiceGroupController@index');
                Route::post('/', 'ServiceGroupController@create');
                Route::put('/', 'ServiceGroupController@update');
                Route::delete('/{id}', 'ServiceGroupController@delete');
            }
        );

        Route::group(
            [
                'prefix' => 'service'
            ],
            function () {
                Route::get('/', 'ServicesController@index');
                Route::post('/', 'ServicesController@create');
                Route::put('/', 'ServicesController@update');
                Route::delete('/{id}', 'ServicesController@delete');
            }
        );

        Route::group(
            [
                'prefix' => 'center'
            ],
            function () {
                Route::get('/', 'HealthCenterController@index');
                Route::post('/', 'HealthCenterController@create');
                Route::put('/', 'HealthCenterController@update');
                Route::delete('/{id}', 'HealthCenterController@delete');
            }
        );

        Route::group(
            [
                'prefix' => 'doctors'
            ],
            function () {
                Route::get('/', 'DoctorsController@index');
                Route::post('/', 'DoctorsController@create');
                Route::put('/', 'DoctorsController@update');
                Route::delete('/{id}', 'DoctorsController@delete');
            }
        );


    }
);
