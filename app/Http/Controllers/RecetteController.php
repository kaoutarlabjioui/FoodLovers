<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecetteRequest;
use App\Http\Requests\UpdateRecetteRequest;
use App\Models\Recette;
use App\Services\ICategoryService;
use App\Services\IRecetteService;
use App\Services\IIngredientService;
use App\Services\ITagService;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
   protected IRecetteService $recetteService;
   protected ICategoryService $catService;
   protected ITagService $tagService;
   protected IIngredientService $ingredientService;

public function __construct(IRecetteService $recetteService,ICategoryService $catService,ITagService $tagService,IIngredientService $ingredientService){
    $this->recetteService = $recetteService;
    $this->catService = $catService;
    $this->tagService = $tagService;
    $this->ingredientService = $ingredientService;
}
   public function index(){

    $recettes = $this->recetteService->getAll();
    $categories =$this->catService->getAll();
    $tags = $this->tagService->getAll();
    $ingredients = $this->ingredientService->getAll();
    return view('admin.adminrecette',compact('recettes','categories','tags','ingredients'));

   }

   public function store(StoreRecetteRequest $request){
    $recette = $request->validated();
    //  dd($request->all());

    $this->recetteService->create($request->all());
    return redirect()->back()->with('success','Recette créée avec succés');
   }

   public function edit($id){
    $recette = $this->recetteService->getById($id);
    // $categorie = $this->recetteService->getCategory();
    return view('admin.editrecette',compact('recette','categorie'));
   }

   public function update(UpdateRecetteRequest $request,$id){
    $recette = $request->validated();
    $this->recetteService->update($id,$recette);

    return redirect('admin/adminrecette');
   }

   public function destroy(Request $recette){
    // dd($recette);
    $this->recetteService->delete($recette);
    return redirect()->back();
   }




}
