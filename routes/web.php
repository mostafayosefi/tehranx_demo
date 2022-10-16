<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\FetchController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\WalletController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\LoginuserController;
use App\Http\Controllers\User\Payment\OrderController;
use App\Http\Controllers\User\Payment\PlaneController;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\ZarinpalController;

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
// Route::get('/', [AdminAuthController::class, 'getLogin'])->name('homepage');

// test

Route::get('/', [LoginuserController::class, 'login'])->name('mylogin');


// test
Route::namespace('Auth')->prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');
    });


    Route::prefix('user')->namespace('User')->name('user.')->group(function () {
        Route::get('/login', [LoginuserController::class, 'login'])->name('login');
        Route::post('/login', [LoginuserController::class, 'authenticate'])->name('login.post');

        Route::get('/register', [LoginuserController::class, 'register'])->name('register');
        Route::post('/register', [LoginuserController::class, 'store'])->name('register.post');

        Route::get('/verify', [LoginuserController::class, 'verify'])->name('verify');
        Route::post('/verify', [LoginuserController::class, 'verifypost'])->name('verify.post');

        Route::get('/forgetpass', [LoginuserController::class, 'forgetpass'])->name('forgetpass');
        Route::post('/forgetpass', [LoginuserController::class, 'forgetpasspost'])->name('forgetpass.post');

        Route::post('/logout', [LoginuserController::class, 'logout'])->name('logout');
    });



    Route::prefix('user')->namespace('User')->name('user.')->middleware([ 'userauth'])->group(function () {


        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class, 'dashboard'])->name('index');
        });


        // zarinpal
        // zarinpal  test

        Route::prefix('zarinpal')->name('zarinpal.')->group(function () {
            Route::get('/verify/{id}', [ZarinpalController::class, 'verify'])->name('verify');
            Route::get('/request/{id}', [ZarinpalController::class, 'request'])->name('request');
        });

            //profile
            Route::prefix('profile')->name('profile.')->group(function () {
                Route::get('/', [ProfileController::class, 'index'])->name('index');
                Route::get('/show', [ProfileController::class, 'show'])->name('show');
                Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
                Route::put('/update', [ProfileController::class, 'update'])->name('update');
                Route::get('/secret', [ProfileController::class, 'secret'])->name('secret');
                Route::put('/secret', [ProfileController::class, 'secret_update'])->name('secret.update');
            });



            Route::prefix('authentication')->name('authentication.')->group(function () {

                Route::get('/{tab_active?}', [AuthenticationController::class, 'index'])->name('index');
                Route::put('/verify_email', [AuthenticationController::class, 'verify_email'])->name('verify_email');
                Route::put('/activition_email', [AuthenticationController::class, 'activition_email'])->name('activition_email');
                Route::put('/verify_tell', [AuthenticationController::class, 'verify_tell'])->name('verify_tell');
                Route::put('/activition_tell', [AuthenticationController::class, 'activition_tell'])->name('activition_tell');
                Route::put('/verify_tells', [AuthenticationController::class, 'verify_tells'])->name('verify_tells');
                Route::put('/activition_tells', [AuthenticationController::class, 'activition_tells'])->name('activition_tells');
                Route::put('/change_contact/{contact}', [AuthenticationController::class, 'change_contact'])->name('change_contact');
                Route::put('/upload_file/{file}', [AuthenticationController::class, 'upload_file'])->name('upload_file');

                Route::post('/bankaccount', [AuthenticationController::class, 'bankaccount'])->name('bankaccount');


            });

        Route::prefix('ticket')->name('ticket.')->group(function () {
            Route::get('/indexticket', [TicketController::class, 'index'])->name('index');
            Route::get('/createticket', [TicketController::class, 'create'])->name('create');
            Route::post('/', [TicketController::class, 'store'])->name('store');
            Route::get('/{id}', [TicketController::class, 'show'])->name('show');
            Route::put('/{ticket}', [TicketController::class, 'update'])->name('update');
            Route::delete('/{id}', [TicketController::class, 'destroy'])->name('destroy');



        });


        Route::prefix('wallet')->name('wallet.')->group(function () {
            Route::get('/indexwallet', [WalletController::class, 'index'])->name('index');
            Route::get('/createwallet', [WalletController::class, 'create'])->name('create');
            Route::post('/', [WalletController::class, 'store'])->name('store');


          });

        Route::prefix('payment')->name('payment.')->group(function () {


            Route::prefix('plane')->name('plane.')->group(function () {

            Route::get('/indexplane/{link_cat}', [PlaneController::class, 'index'])->name('index');
            Route::get('/indexplane/{link_cat}/{link_subcat}', [PlaneController::class, 'index_subcat'])->name('index_subcat');
            Route::get('/indexplane/{link_cat}/{link_subcat}/{link_form}', [PlaneController::class, 'index_form'])->name('index_form');

            });


            Route::prefix('order')->name('order.')->group(function () {



                Route::post('/{form}', [OrderController::class, 'store'])->middleware([ 'checkactivitionuser'])->name('store');


                Route::get('/indexorder', [OrderController::class, 'index'])->name('index');
                Route::get('/editorder/{id}', [OrderController::class, 'edit'])->name('edit');
                Route::get('/showorder/{id}', [OrderController::class, 'show'])->name('show');
                Route::put('/{id}', [OrderController::class, 'update'])->name('update');




            });


            });






        });



        Route::prefix('fetch')
        ->name('fetch.')->group(function () {

            Route::get('/view_js_form/{value}/{guard}', [FetchController::class, 'view_js_form'])->name('view_js_form');

        });




        Route::prefix('getway')
        ->name('getway.')->group(function () {
            Route::get('/zarinpal', [FetchController::class, 'zarinpaltest'])->name('zarinpal');
            Route::get('/zarinpalverify', [FetchController::class, 'zarinpalverify'])->name('zarinpalverify');
        });






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




 //Clear route cache
 Route::get('/route-cache', function() {
    Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Config cache cleared';
});

// Clear application cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cachee
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache cleared';
});

// Clear cache using reoptimized class
Route::get('/optimize-clear', function() {
    Artisan::call('optimize:clear');
    return 'View cache cleared';
});

// composer dump-autoload
Route::get('/updateapp', function() {

    exec('composer dump-autoload');
    echo 'composer dump-autoload complete';
});


//salam farmande

// git remote set-url origin "https://mostafayosefi@github.com/mostafayosefi/payment.git"


//salam farmande

