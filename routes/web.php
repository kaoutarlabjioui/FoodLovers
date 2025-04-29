<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Produit;
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
    return view('home');
});



Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

//category
    Route::get('/admincategory',[CategoryController::class,'index']);
    Route::post('/category/store',[CategoryController::class,'store']);
    Route::delete('/category/destroy',[CategoryController::class, 'destroy'])->name("admincategory.destroy");
    Route::get('/editecategory/{id}',[CategoryController::class,'edit']);
    Route::post('/category/update',[CategoryController::class,'update']);

//tag
    Route::get('/admintag',[TagController::class,'index']);
    Route::post('/tag/store',[TagController::class,'store']);
    Route::delete('/tag/destroy',[TagController::class, 'destroy'])->name("admintag.destroy");
    Route::get('/editetag/{id}',[TagController::class,'edit']);
    Route::post('/tag/update',[TagController::class,'update']);

//recette
    Route::get('/adminrecette',[RecetteController::class,'index']);
    Route::post('/recette/store',[RecetteController::class,'store']);
    Route::delete('/recette/destroy',[RecetteController::class, 'destroy'])->name("adminrecette.destroy");
    Route::get('/editrecette/{id}',[RecetteController::class,'edit']);
    Route::post('/recette/update',[RecetteController::class,'update']);

//ingredient
    Route::get('/adminingredient',[IngredientController::class,'index']);
    Route::post('/ingredient/store',[IngredientController::class,'store']);
    Route::delete('/ingredient/destroy',[IngredientController::class, 'destroy'])->name("adminingredient.destroy");
    Route::get('/editingredient/{id}',[IngredientController::class,'edit']);
    Route::post('/ingredient/update',[IngredientController::class,'update']);
    //produit

    Route::get('/adminshop',[ProduitController::class,'index']);
    Route::post('/produit/store',[ProduitController::class,'store']);
    Route::delete('/produit/destroy',[ProduitController::class, 'destroy'])->name("adminproduit.destroy");
    Route::get('/editproduit/{id}',[ProduitController::class,'edit']);
    Route::post('/produit/update',[ProduitController::class,'update']);
    //commande
    Route::get('/admincommande',[CommandeController::class,'index']);

    //user
    Route::get('/adminusers',[UserController::class,'index']);
    Route::put('/updateuserstatus',[UserController::class,'updateStatus']);

    //competition
    Route::get('/admincompetition',[CompetitionController::class,'index']);
    Route::post('/competition/store',[CompetitionController::class,'store']);
    Route::delete('/competition/destroy',[CompetitionController::class,'destroy']);
    Route::put('/updatecompetition',[CompetitionController::class,'updateCompetition']);
    Route::post('/choisirgagnant',[CompetitionController::class,'choisirGagnant']);

});



    Route::get('/profile',function(){
       return view('client.clientinfo');
    });
    Route::post('/commandes/page',[CommandeController::class,'store']);

    Route::get('/userdesactive',function(){
        return view('pageuserdesactive');
    });

Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/logins',[AuthController::class, 'login']);
Route::get('/register',[AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/registers',[AuthController::class, 'register']);
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');


Route::get('/roles',[RoleController::class,'index']);
Route::post('/roles/store',[RoleController::class,'store']);


Route::get('/panier',[ProduitController::class,'voirPanier']);
Route::post('/panier/ajouter',[ProduitController::class,'ajouterAuPanier'])->name('panier.ajouter');
Route::delete('/panier/suprimer',[ProduitController::class,'supprimerDuPanier'])->name('panier.supprimer');
Route::post('/panier/vider', [ProduitController::class, 'viderPanier'])->name('panier.vider');
Route::post('/panier/mettre-a-jour/{id}', [ProduitController::class, 'updateQuantite'])->name('panier.updateQuantite');

Route::get('/',[RecetteController::class,'show']);
Route::post('/recettedetails',[RecetteController::class,'detailsRecette']);



Route::get('/competition',[CompetitionController::class,'show']);
Route::middleware(['auth'])->group(function () {
  Route::post('/inscrire',[CompetitionController::class,'inscription']);
  Route::get('/client/edituserrecette/{id}',[RecetteController::class,'editMyRecette']);
Route::post('/client/userrecette/update',[RecetteController::class,'updateMyRecette']);
Route::get('/client/clientrecette',[UserController::class,'showUserRecette'] );
    Route::get('/client/clientcompetition',[UserController::class,'showUserCompetition'] );
    Route::get('/client/clientcommande',[UserController::class,'showUserCommande'] );
    Route::get('/client/clientcompetition',[UserController::class,'showUserCompetition'] );
    Route::post('/client/clientrecettestor',[RecetteController::class,'store']);
    Route::delete('/client/clientrecettedestroy',[RecetteController::class,'destroy'])->name("clientrecette.destroy");
});


Route::get('/boutique',[ProduitController::class,'show']);
Route::post('/detailsproduit',[ProduitController::class,'detailsProduit']);
Route::get('/detailsproduit',[ProduitController::class,'detailsProduit']);

Route::post('/address/store',[UserController::class,'storeAddress']);







Route::middleware('auth')->group(function () {
    Route::controller(PaymentController::class)->group(function(){
        Route::post('/makepay', 'makePay');
        Route::post('/command/pay', 'processPayment');
    });


});


Route::fallback(function () {
    return redirect('/');
});
