<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/debug-sentry', function () {
    Log::debug('An informational message.', ['id' => 1]);
    throw new Exception('My first Sentry error!');
});
Route::get('/parse', 'ParseController@index')->name('profile');
