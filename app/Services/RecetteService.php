<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Recette;
use App\Repositories\RecetteRepositoryInterface;

class RecetteService implements IRecetteService
{

protected RecetteRepositoryInterface $recetteRepo;
protected ICategoryService $catService;
protected ITagService $tagService;
protected IIngredientService $ingredientService;


public function __construct(RecetteRepositoryInterface $recetteRepo,ICategoryService $catService,ITagService $tagService,IIngredientService $ingredientService)
{
    $this->recetteRepo =  $recetteRepo;
    $this->catService = $catService;
    $this->tagService = $tagService;
    $this->ingredientService=$ingredientService;
}


public function getAll(){
    return $this->recetteRepo->all();
}

public function getById( $id)
{
    return $this->recetteRepo->find($id);
}

public function create($data){


    $image = $data['photo'];
    $extension = $image->getClientOriginalExtension();
    $fileName = 'recette_'.time().'.'.$extension;
    $path=$image->storeAs('uploads',$fileName,'public');
    $data['photo']=$path;
    $cat=  $this->catService->findByName($data['category_name']);
    $tags = $data['tags'];
    $ingredients = $data['ingredients'];
    $user= auth()->user();
    $recette = new Recette();
    $recette->titre=$data["titre"];
    $recette->description=$data["description"];
    $recette->instruction=$data["instruction"];
    $recette->photo=$data["photo"];
    $recette->category()->associate($cat);
    $recette->user()->associate($user);
    $this->recetteRepo->create($recette);
    foreach($tags as $tag_name){

        $tag = $this->tagService->findByName($tag_name);
        $recette->tags()->attach($tag);

    }

    foreach($ingredients as $ingredient_name){

        $ingredient = $this->ingredientService->findByName($ingredient_name);
        $recette->ingredients()->attach($ingredient);
    }





    return $recette;
}

public function update( $data)
{



    $image = $data['photo'];
    $extension = $image->getClientOriginalExtension();
    $fileName = 'recette_'.time().'.'.$extension;
    $path=$image->storeAs('uploads',$fileName,'public');
    $data['photo']=$path;
    // dd($data);
    $cat=  $this->catService->findByName($data['category_name']);
    $tags = $data['tags'];
    $ingredients = $data['ingredients'];

    // $recette = new Recette();
    $recette = $this->getById($data['id']);

    $recette->titre=$data["titre"];
    $recette->description=$data["description"];
    $recette->instruction=$data["instruction"];
    $recette->photo=$data["photo"];
    $recette->category()->associate($cat);
    $this->recetteRepo->update($recette,$data);
    foreach($tags as $tag_name){

        $tag = $this->tagService->findByName($tag_name);
        $recette->tags()->attach($tag);

    }

    foreach($ingredients as $ingredient_name){

        $ingredient = $this->ingredientService->findByName($ingredient_name);
        $recette->ingredients()->attach($ingredient);
    }

    return $recette;

}

public function delete( $recette)
{
    // dd($recette);
    return $this->recetteRepo->delete($recette);
}


}
