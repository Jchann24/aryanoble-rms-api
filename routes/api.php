<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return $request->user();
});

//SUPERUSER ROUTES
Route::group(['middleware' => ['auth:api'], 'prefix' => 'v1'], function () {
    Route::apiResource('users', 'API\V1\UserController')->except('store');
    Route::apiResource('erfs', 'API\V1\ErfController');
    Route::apiResource('candidate-cards', 'API\V1\CandidateCardController');
    Route::apiResource('talents', 'API\V1\TalentController');
    Route::apiResource('interview-details', 'API\V1\InterviewDetailController');

    Route::post('talents/{talent}', 'API\V1\TalentController@update');
    Route::post('register', 'API\V1\AuthController@register')->name('api.register');
    Route::post('update-notification', 'API\V1\EmailNotification');
    Route::post('form-email', 'API\V1\FormEmail');
});

//AUTHS
Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {
    Route::post('login', 'API\V1\AuthController@login')->name('api.login');
    Route::post('logout', 'API\V1\AuthController@logout')->name('api.logout');
    Route::post('refresh', 'API\V1\AuthController@refresh')->name('api.jwt-refresh');
    Route::get('me', 'API\V1\AuthController@me')->name('api.me');
});
