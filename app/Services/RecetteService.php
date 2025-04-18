<?php
namespace App\Services;

use App\Models\Category;
use App\Repositories\RecetteRepositoryInterface;

class RecetteService implements IRecetteService
{

protected RecetteRepositoryInterface $recetteRepo;
protected ICategoryService $catService;
public function __construct(RecetteRepositoryInterface $recetteRepo,ICategoryService $catService)
{
    $this->recetteRepo =  $recetteRepo;
    $this->catService = $catService;
}


public function getAll(){
    return $this->recetteRepo->all();
}

public function getById(int $id)
{
    return $this->recetteRepo->find($id);
}

public function create($data){

    // if (isset($data['photo'])) {
    //     $data['photo'] = $data['photo']->store('recette', 'public');
    // }
    $image = $data['image'];
    $extension = $image->getClientOriginalExtension();
    $fileName = 'recette_'.time().'.'.$extension;
    $path=$image->storeAs('uploads',$fileName,'public');
    $data['image']=$path;
    $cat=  $this->catService->findByName($data['category_name']);
    return $this->recetteRepo->create($data, $cat);
}

public function update(int $id, array $data)
{
    // if (isset($data['photo'])) {
    //     $data['photo'] = $data['photo']->store('recette', 'public');
    // }

    return $this->recetteRepo->update($id, $data);
}

public function delete(int $id)
{
    return $this->recetteRepo->delete($id);
}

public function getCategory()
{
    return Category::all();
}

}
