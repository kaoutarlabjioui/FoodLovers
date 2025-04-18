<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecetteRequest;
use App\Http\Requests\UpdateRecetteRequest;
use App\Models\Recette;
use App\Services\ICategoryService;
use App\Services\IRecetteService;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
   protected IRecetteService $recetteService;
   protected ICategoryService $catService;

public function __construct(IRecetteService $recetteService,ICategoryService $catService){
    $this->recetteService = $recetteService;
    $this->catService = $catService;
}
   public function index(){

    $recettes = $this->recetteService->getAll();
    $categories =$this->catService->getAll();
    return view('admin.adminrecette',compact('recettes','categories'));

   }

   public function store(StoreRecetteRequest $request){
    $recette = $request->validated();
    $this->recetteService->create($recette);
    return redirect()->back()->with('success','Recette créée avec succés');
   }

   public function edit($id){
    $recette = $this->recetteService->getById($id);
    $categorie = $this->recetteService->getCategory();
    return view('admin.editrecette',compact('recette','categorie'));
   }

   public function update(UpdateRecetteRequest $request,$id){
    $recette = $request->validated();
    $this->recetteService->update($id,$recette);

    return redirect('admin/adminrecette');
   }

   public function destroy($id){
    $this->recetteService->delete($id);
    return redirect()->back();
   }




}
