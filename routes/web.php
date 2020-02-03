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

use Illuminate\Support\Facades\Auth;


Route::resource('events', 'EventController');

Auth::routes();

Route::get('/', 'EventController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/profile/{user}', 'ProfileController@show');

Route::get('/ticket/{ticket}','TicketController@show');


Route::get('/getTicket/{event}','TicketController@getTicket');




















Route::post('/profileImg', 'ProfileController@profileImg');
Route::post('/addSession', 'SessionController@store');
Route::post('/editSession', 'SessionController@update');
Route::post('/deleteSession', 'SessionController@destroy');
