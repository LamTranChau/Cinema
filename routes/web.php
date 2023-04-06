<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\FilmController;
use  App\Http\Controllers\Admin\TimeController;
use  App\Http\Controllers\Admin\UserController;
use  App\Http\Controllers\Admin\BrandController;
use  App\Http\Controllers\Admin\RoomController;
use  App\Http\Controllers\Admin\SeatController;
use  App\Http\Controllers\Admin\CategoryController;
use  App\Http\Controllers\Admin\TicketController;
use  App\Http\Controllers\Admin\ShowtimeController;
use  App\Http\Controllers\Admin\CategoryFilmController;
use  App\Http\Controllers\Admin\AppmanageController;
use  App\Http\Controllers\Auth\LoginController;
use  App\Http\Controllers\UploadController;
use  App\Http\Controllers\AjaxController;

use  App\Http\Controllers\Client\ClientController;

use  App\Http\Controllers\Test_html\index;

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

// Route::get('/', function () {
//     return redirect()->route('client.index');
//     // return redirect()->route('login');
// });

Route::get('test', [index::class, 'index'])->name('index');

Route::get('login', [LoginController::class, 'templateLogin'])->name('templateLogin');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('upload1', [UploadController::class, 'upload_theme'])->name('upload_theme');
Route::post('upload1', [UploadController::class, 'upload'])->name('upload');

Route::get('ajax', [AjaxController::class, 'ajax'])->name('ajax');
Route::post('getdata', [AjaxController::class, 'getdata'])->name('getdata');
Route::post('getdata1', [AjaxController::class, 'getdata1'])->name('getdata1');
Route::get('hello', [AjaxController::class, 'batdong'])->name('batdong');

Route::get('sendMail', [UploadController::class, 'sendMail'])->name('sendMail');

Route::middleware(['check_login_admin'])->group(function(){
    Route::prefix('admin')->name('admin.')->group(function(){
         // App admin
        Route::prefix('appmanage')->name('appmanage.')->controller(AppmanageController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('rooms/{id}','rooms')->name('rooms');
            Route::get('seats/{id}','seats')->name('seats');
            Route::get('showtime/{id}','showtime')->name('showtime');
            Route::post('store','store')->name('store');
            Route::get('show/{id}','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
    
        });

        // Phim
        Route::prefix('film')->name('film.')->controller(FilmController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('show/{id}','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
    
        });
    
        // User
        Route::prefix('user')->name('user.')->controller(UserController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('show/{id}','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
    
        });
    
        // Time
        Route::prefix('time')->name('time.')->controller(TimeController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('show/{id}','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
    
        });
    
        // brand
        Route::prefix('brand')->name('brand.')->controller(BrandController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('show/{id}','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
    
        });
    
        // room
        Route::prefix('room')->name('room.')->controller(RoomController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('show','show')->name('show');
            Route::post('Testshow','testshow')->name('testshow');
            Route::post('showseat','showseat')->name('showseat');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
    
        });
    
        // seat
        Route::prefix('seat')->name('seat.')->controller(SeatController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::post('show','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
            
        });
    
        // category
        Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('show/{id}','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
            
        });
    
        // showtime
        Route::prefix('showtime')->name('showtime.')->controller(ShowtimeController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::post('show','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
            
        });
    
        // ticket
        Route::prefix('ticket')->name('ticket.')->controller(TicketController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::post('show','show')->name('show');
            Route::post('showseat','showseat')->name('showseat');
            Route::post('getmoney','getmoney')->name('getmoney');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
            
        });

        Route::get('payment', [ClientController::class, 'payment'])->name('payment');

        // categoryfilm
        Route::prefix('categoryfilm')->name('categoryfilm.')->controller(CategoryFilmController::class)->group(function(){
    
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('store','store')->name('store');
            Route::get('show/{id}','show')->name('show');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('delete/{id}','destroy')->name('destroy');
            
        });
    });
});

Route::get('/', [ClientController::class, 'index'])->name('index');
// Route::get('moviepage/{id}', [ClientController::class, 'moviepage'])->name('moviepage');



Route::prefix('client')->name('client.')->controller(ClientController::class)->group(function(){
   // User  
        // Route::get('index','index')->name('index');
        Route::get('moviepage/{id}','moviepage')->name('moviepage');
        Route::get('create','create')->name('create');

        Route::get('book1','book1')->name('book1');
        Route::post('show','show')->name('show');

        Route::post('book2','book2')->name('book2');
        Route::post('showseat','showseat')->name('showseat');
        Route::post('getmoney','getmoney')->name('getmoney');

        Route::post('book3','book3')->name('book3');

        Route::get('book4','book4')->name('book4');

        Route::post('pay','pay')->name('pay'); // thanh toan vnpay
        Route::get('returnurlpay','returnurlpay')->name('returnurlpay'); // return thong tin thanh toan vnpay
        Route::post('check','check')->name('check'); // kiem tra thong tin thanh toan

        // Route::post('vnpay_pay','vnpay_pay')->name('vnpay_pay');

        Route::post('store','store')->name('store');
        // Route::get('show/{id}','show')->name('show');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('delete/{id}','destroy')->name('destroy');    
});



