<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
   
    Route::group(['middleware' => ['guest']], function() {
     
        Route::get('/login', 'LoginController@show')->name('login');
	Route::post('/login', 'LoginController@login')->name('login.perform');

        

    });

    Route::group(['middleware' => ['auth']], function() {
		
		Route::get('/', 'HomeController@index')->name('dashboard.index');
		
		/** Hastalar **/
		Route::get('patients', ['uses'=>'PatientsController@index', 'as'=>'patients.index']);
		Route::post('patients/list', ['uses'=>'PatientsController@datatables', 'as'=>'patients.list']);
		Route::post('patients/store', ['uses'=>'PatientsController@store', 'as'=>'patients.store']);
		Route::get('patient/{patients:uuid}', ['uses'=>'PatientsController@patient', 'as'=>'patients.view']);
		
		
		/** Takvim **/
		
		Route::get('events', ['uses'=>'EventsController@index', 'as'=>'events.index']);
		Route::post('eventSave', ['uses'=>'EventsController@save', 'as'=>'events.eventsave']);
		
		
		/** Ayarlar  **/
		Route::get('ayarlar', ['uses'=>'SettingsController@index', 'as'=>'settings.index']);
		
		
		
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout');
    });
});