<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Services\ICategoryService;
use App\Services\IIngredientService;
use App\Services\ITagService;
use App\Services\IUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

protected IUserService $userService;
protected UserRepositoryInterface $userRepo;
protected ICategoryService $catService;
protected ITagService $tagService;
protected IIngredientService $ingredientService;

public function __construct(IUserService $userService,ICategoryService $catService,ITagService $tagService,IIngredientService $ingredientService,UserRepositoryInterface $userRepo){

    $this->userService = $userService;
    $this->userRepo = $userRepo;
    $this->catService = $catService;
    $this->tagService = $tagService;
    $this->ingredientService = $ingredientService;
}



public function index(){

    $users = $this->userRepo->getAll();


    return view('admin.adminusers',compact('users'));
}


public function storeAddress(Request $request){

 $data = $request->validate([
    'ville' => 'required|string|max:255',
    'address' => 'required|string|max:255',
    'pays' => 'required|string|max:255',
    'code_postal' => 'required|string|max:10',
  ]);

  $this->userService->storeAddress($data);

  return redirect()->back();
}



public function showUserRecette(){

$recettes = auth()->user()->recettes()->latest()
->paginate(2);
  $categories =$this->catService->getAll();
    $tags = $this->tagService->getAll();
    $ingredients = $this->ingredientService->getAll();


return  view('client.clientrecette',compact('recettes','categories','tags','ingredients'));

}


public function showUserCommande(){
    $commandes = auth()->user()->commandes()->with('commandesItems.produit')->latest()
    ->paginate(5);
    // dd($commands);

    return view('client.clientcommande',compact('commandes'));
}


}
