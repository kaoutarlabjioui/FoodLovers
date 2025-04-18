<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Models\Recette;
use App\Models\Tag;
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
    Route::get('/admincategory',[CategoryController::class,'index']);
    Route::post('/category/store',[CategoryController::class,'store']);
    Route::delete('/category/destroy',[CategoryController::class, 'destroy'])->name("admincategory.destroy");
    Route::get('/editecategory/{id}',[CategoryController::class,'edit']);
    Route::post('/category/update',[CategoryController::class,'update']);

    Route::get('/admintag',[TagController::class,'index']);
    Route::post('/tag/store',[TagController::class,'store']);
    Route::delete('/tag/destroy',[TagController::class, 'destroy'])->name("admintag.destroy");
    Route::get('/editetag/{id}',[TagController::class,'edit']);
    Route::post('/tag/update',[TagController::class,'update']);


    Route::get('/adminrecette',[RecetteController::class,'index']);
    Route::post('/recette/store',[RecetteController::class,'store']);
    Route::delete('/recette/destroy',[RecetteController::class, 'destroy'])->name("adminrecette.destroy");
    Route::get('/editrecette/{id}',[RecetteController::class,'edit']);
    Route::post('/recette/update',[RecetteController::class,'update']);
});

Route::get('/profile', function () {
    return view('profile');
});





Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/logins',[AuthController::class, 'login']);
Route::get('/register',[AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/registers',[AuthController::class, 'register']);


Route::get('/roles',[RoleController::class,'index']);
Route::post('/roles/store',[RoleController::class,'store']);


// Route::get('/admincategory',[CategoryController::class,'index']);
// Route::post('/category/store',[CategoryController::class,'store']);
// Route::delete('/category/destroy',[CategoryController::class, 'destroy']);

