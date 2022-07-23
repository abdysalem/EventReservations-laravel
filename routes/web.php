<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageHomeController;

use App\Http\Controllers\HomeController;





Route::get("/",[PageHomeController::class,"indexhome"]);

Route::get("/MakeReservations",[PageHomeController::class,"MakeReservations"]
)->name('MakeReservations');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [PageHomeController::class, 'indexhome'])->name('indexhome');
    Route::get('/MakeReservations', [PageHomeController::class, 'MakeReservations'])->name('MakeReservations');
    
});






Route::get("/redirects",[PageHomeController::class,"redirects"]);



Route::middleware(["auth:sanctum", 'verified'])->get('/menu', function()
{
	return view('menu');
})->name('menu');








Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Rooms
    Route::delete('rooms/destroy', 'RoomsController@massDestroy')->name('rooms.massDestroy');
    Route::resource('rooms', 'RoomsController');

    // Events
    Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
    Route::resource('events', 'EventsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

    Route::get('search-room', 'BookingsController@searchRoom')->name('searchRoom');
    Route::post('book-room', 'BookingsController@bookRoom')->name('bookRoom');

    Route::get('my-credits', 'BalanceController@index')->name('balance.index');
    Route::post('add-balance', 'BalanceController@add')->name('balance.add');

    Route::resource('transactions', 'TransactionsController')->only(['index']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');












Auth::routes();

Route::get('/home', 'PageHomeController@indexhome')->name('home');
Auth::routes();

