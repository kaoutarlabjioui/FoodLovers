<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/register', function () {
//     return view('register');
// });
Route::get('/detailrecette', function () {
    return view('detailrecette');
});
Route::get('/boutique', function () {
    return view('boutique');
});
Route::get('/panier', function () {
    return view('panier');
});
Route::get('/competition', function () {
    return view('competition');
});
Route::get('/detailcompetition', function () {
    return view('detailcompetition');
});

Route::prefix('admin')->group(function(){

    Route::get('/adminrecette', function () {
        return view('admin.adminrecette');
    });
    Route::get('/adminusers', function () {
        return view('admin.adminusers');
    });
    Route::get('/admincompetition', function () {
        return view('admincompetition');
    });
    Route::get('/adminshop', function () {
        return view('adminshop');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::get('/profile', function () {
    return view('profile');
});





Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/logins',[AuthController::class, 'login']);
Route::get('/register',[AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/registers',[AuthController::class, 'register']);
