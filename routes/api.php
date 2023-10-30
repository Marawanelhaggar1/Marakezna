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

// Route::group(
//     [
//         'namespace' => 'App\Http\Controllers',


//     ],
//     function () {
//         Route::get('/google', 'SocialiteController@redirectToGoogle');
//         Route::get('api/google/callback', 'SocialiteController@handelGoogleCallback');
//     }
// );


Route::group(
    [
        'namespace' => 'App\Http\Controllers',
        'middleware' => 'api'
    ],
    function () {

        Route::group(
            [
                'prefix' => 'auth'
            ],
            function () {

                Route::post('/register', 'auth@register');
                Route::post('/login', 'auth@login');
                Route::post('/reset-password', 'auth@forgetPassword');
                Route::post('/google', 'SocialiteController@handelGoogleCallback');
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
                Route::get('/{id}', 'ServiceGroupController@getById');
                Route::post('/', 'ServiceGroupController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'ServiceGroupController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'ServiceGroupController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'service'
            ],
            function () {
                Route::get('/', 'ServicesController@index');
                Route::get('/{id}', 'ServicesController@getById');
                Route::post('/', 'ServicesController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'ServicesController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'ServicesController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'center'
            ],
            function () {
                Route::get('/', 'HealthCenterController@index');
                Route::get('/{id}', 'HealthCenterController@getById');
                Route::post('/', 'HealthCenterController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'HealthCenterController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'HealthCenterController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'doctors'
            ],
            function () {
                Route::get('/', 'DoctorsController@index');
                Route::get('/{id}', 'DoctorsController@getById');
                Route::post('/', 'DoctorsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'DoctorsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'DoctorsController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'patients'
            ],
            function () {
                Route::get('/', 'PatientsController@index');
                Route::get('/{id}', 'PatientsController@getById');
                Route::post('/', 'PatientsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'PatientsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'PatientsController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'booking'
            ],
            function () {
                Route::get('/', 'BookingsController@index');
                Route::get('/{id}', 'BookingsController@getById');
                Route::post('/', 'BookingsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'BookingsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'BookingsController@delete')->middleware(['auth:sanctum']);
            }
        );
    }
);
