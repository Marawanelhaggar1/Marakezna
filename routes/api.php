<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CenterCallsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorCallsController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\MobileSettingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\WebSettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\SubAreaController;

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
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['api', 'changeLanguage']
    ],
    function () {

        Route::group(
            [
                'prefix' => 'auth'
            ],
            function () {

                Route::post('/register', 'auth@register');
                Route::get('/', 'auth@index');
                Route::post('/login', 'auth@login');
                Route::put('/update/profile', 'auth@updateProfile')->middleware(['auth:sanctum']);
                Route::put('/change/password', 'auth@changePassword')->middleware(['auth:sanctum']);
                Route::post('/google', 'SocialiteController@handelGoogleCallback');
                Route::post('/forgot/password',  [ForgotPasswordController::class, 'sendResetLinkEmail']);
                Route::post('/reset/password', 'ResetPasswordController@showResetForm')->middleware(['auth:sanctum']);
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
                Route::get('/featured', 'ServicesController@getFeaturedServices');
                Route::get('/{id}', 'ServicesController@getById');
                Route::post('/', 'ServicesController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'ServicesController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'ServicesController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'area'
            ],

            function () {
                Route::get('/', 'AreaController@index');
                Route::post('/search', 'AreaController@search');
                Route::get('/admin', 'AreaController@getForAdmin');
                Route::get('/{id}', 'AreaController@getById');
                Route::post('/', 'AreaController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'AreaController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'AreaController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'sub/area',
            ],

            function () {
                Route::get('/', 'SubAreaController@index');
                Route::get('/{id}', 'SubAreaController@getById');
                Route::post('/', 'SubAreaController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'SubAreaController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'SubAreaController@delete')->middleware(['auth:sanctum']);
            }
        );


        Route::group(
            [
                'prefix' => 'doctor/calls'
            ],

            function () {
                Route::get('/', 'DoctorCallsController@index');
                Route::get('/{id}', 'DoctorCallsController@getById');
                Route::post('/', 'DoctorCallsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'DoctorCallsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'DoctorCallsController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'center/calls'
            ],

            function () {
                Route::get('/', 'CenterCallsController@index');
                Route::get('/{id}', 'CenterCallsController@getById');
                Route::post('/', 'CenterCallsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'CenterCallsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'CenterCallsController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'faqs',
            ],

            function () {
                Route::get('/', 'FaqsController@index');
                Route::get('/{id}', 'FaqsController@getById');
                Route::post('/', 'FaqsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'FaqsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'FaqsController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'icons',
            ],

            function () {
                Route::get('/', 'IconsController@index');
                Route::get('/{id}', 'IconsController@getById');
                Route::post('/', 'IconsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'IconsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'IconsController@delete')->middleware(['auth:sanctum']);
            }
        );
        Route::group(
            [
                'prefix' => 'about/us'
            ],

            function () {
                Route::get('/', 'AboutUsController@index');
                Route::get('/{id}', 'AboutUsController@getById');
                Route::post('/', 'AboutUsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'AboutUsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'AboutUsController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'notifications',
            ],

            function () {
                Route::get('/', 'NotificationController@getByUser')->middleware(['auth:sanctum']);;
                Route::get('/unread', 'NotificationController@readNotification')->middleware(['auth:sanctum']);;
                Route::post('/{id}', 'NotificationController@markAsRead')->middleware(['auth:sanctum']);
                // Route::put('/', 'AboutUsController@update')->middleware(['auth:sanctum']);
                // Route::delete('/{id}', 'AboutUsController@delete')->middleware(['auth:sanctum']);
            }
        );


        Route::group(
            [
                'prefix' => 'center'
            ],
            function () {
                Route::get('/', 'HealthCenterController@index');
                Route::get('/scans/labs', 'HealthCenterController@getScansOrLabs');
                Route::post('/order', 'HealthCenterController@changeOrder');
                Route::get('/admin', 'HealthCenterController@getForAdmin');
                Route::get('/{id}', 'HealthCenterController@getById');
                Route::get('/area/{id}', 'HealthCenterController@getByArea');
                Route::get('/category/lab/area/{id}', 'HealthCenterController@getLabsByArea');
                Route::get('/category/scan/area/{id}', 'HealthCenterController@getScansByArea');
                Route::get('/sub/area/{id}', 'HealthCenterController@getBySubArea');
                Route::get('/category/lab/sub/area/{id}', 'HealthCenterController@getLabsBySubArea');
                Route::get('/category/scan/sub/area/{id}', 'HealthCenterController@getScansBySubArea');
                Route::get('/category/lab', 'HealthCenterController@getLabs');
                Route::get('/category/scan', 'HealthCenterController@getScans');
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
                Route::get('/admin', 'DoctorsController@getForAdmin');
                Route::get('/featured', 'DoctorsController@getFeaturedDoctors');
                Route::get('/{id}', 'DoctorsController@getById');
                Route::get('/specialty/{id}', 'DoctorsController@getDoctorBySpecialty');
                Route::get('/center/{id}', 'DoctorsController@getDoctorByCenter');
                Route::get('/{center_id}/{specialty_id}', 'DoctorsController@getDoctorByCenterAndSpecialty');
                Route::post('/', 'DoctorsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'DoctorsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'DoctorsController@delete')->middleware(['auth:sanctum']);
            }
        );
        Route::group(
            [
                'prefix' => 'mobile/setting'
            ],
            function () {

                Route::get('/', 'MobileSettingController@index');
                Route::get('/{id}', 'MobileSettingController@getById');
                Route::post('/', 'MobileSettingController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'MobileSettingController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'MobileSettingController@delete')->middleware(['auth:sanctum']);
            }
        );


        Route::group(
            [
                'prefix' => 'web/setting'
            ],
            function () {

                Route::get('/', 'WebSettingController@index');
                Route::get('/count', 'WebSettingController@getNumbers');
                Route::get('/{id}', 'WebSettingController@getById');
                Route::post('/', 'WebSettingController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'WebSettingController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'WebSettingController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'contact'
            ],
            function () {

                Route::get('/', 'ContactController@index');
                Route::get('/{id}', 'ContactController@getById');
                Route::post('/', 'ContactController@create');
                // Route::put('/', 'ContactController@update');
                Route::delete('/{id}', 'ContactController@delete');
            }
        );
        Route::group(
            [
                'prefix' => 'slides'
            ],
            function () {

                Route::get('/', 'SlideController@index');
                Route::get('/{id}', 'SlideController@getById');
                Route::post('/', 'SlideController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'SlideController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'SlideController@delete')->middleware(['auth:sanctum']);
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
                Route::get('/user/{id}', 'BookingsController@getByUserId')->middleware(['auth:sanctum']);;
                Route::post('/', 'BookingsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'BookingsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'BookingsController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'specialization'
            ],
            function () {
                Route::get('/', 'SpecializationController@index');
                Route::get('/admin', 'SpecializationController@getForAdmin');
                Route::get('/{id}', 'SpecializationController@getById');
                Route::post('/search', 'SpecializationController@search');

                Route::post('/', 'SpecializationController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'SpecializationController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'SpecializationController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'visits'
            ],
            function () {
                Route::get('/', 'VisitsController@index');
                Route::get('/{id}', 'VisitsController@getById');
                Route::post('/', 'VisitsController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'VisitsController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'VisitsController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'insurance'
            ],
            function () {
                Route::get('/', 'InsuranceController@index');
                Route::get('/{id}', 'InsuranceController@getById');
                Route::post('/', 'InsuranceController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'InsuranceController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'InsuranceController@delete')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'doctor/schedule',
            ],
            function () {
                Route::get('/', 'DoctorScheduleController@index');
                Route::get('/{id}', 'DoctorScheduleController@show');
                Route::get('doc/{id}', 'DoctorScheduleController@getSchedulesByDoctor');
                Route::post('/', 'DoctorScheduleController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'DoctorScheduleController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'DoctorScheduleController@destroy')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            [
                'prefix' => 'center/schedule',
            ],
            function () {
                Route::get('/', 'HealthCenterScheduleController@index');
                Route::get('/{id}', 'HealthCenterScheduleController@show');
                Route::get('cen/{id}', 'HealthCenterScheduleController@getSchedulesByCenter');
                Route::post('/', 'HealthCenterScheduleController@create')->middleware(['auth:sanctum']);
                Route::put('/', 'HealthCenterScheduleController@update')->middleware(['auth:sanctum']);
                Route::delete('/{id}', 'HealthCenterScheduleController@destroy')->middleware(['auth:sanctum']);
            }
        );

        Route::group(
            ['prefix' => 'search'],
            function () {
                Route::post('/', 'DoctorsController@search');
            }
        );
    }
);
