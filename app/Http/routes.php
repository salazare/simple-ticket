<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/tickets');
})->middleware('guest');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::resource('categorias', 'CategoriaController');
    Route::resource('estados', 'EstadoController');
    Route::get('tickets/cerrados', 'TicketController@cerrados');
    Route::get('tickets/pendientes', 'TicketController@pendientes');
    Route::get('tickets/asignados', 'TicketController@asignados');
    Route::get('tickets/completados', 'TicketController@completados');
    Route::get('tickets/tomar/{ticket}', 'TicketController@tomar');
    Route::post('tickets/asignar/{ticket}', 'TicketController@asignar');
    Route::get('tickets/cerrar/{ticket}', 'TicketController@cerrar');
    Route::get('tickets/asignados/all', 'TicketController@todos_asignados');
    Route::resource('tickets', 'TicketController');
    Route::resource('comentarios', 'ComentarioController');
    //
});

