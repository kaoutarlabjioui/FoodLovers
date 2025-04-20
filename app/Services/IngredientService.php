<?php
namespace App\Services;

use App\Repositories\IngredientRepositoryInterface;


class IngredientService implements IIngredientService{

    protected IngredientRepositoryInterface $ingredientRepo;

    public function __construct(IngredientRepositoryInterface $ingredientRepo)
    {
        $this->ingredientRepo = $ingredientRepo;

    }



    public function getAll(){

        return $this->ingredientRepo->getAll();
    }
    public function getById($id){
       return $this->ingredientRepo->find($id);
    }
    public function create($data){

      return $this->ingredientRepo->create($data);


    }
    public function update($ingredient,$data){

        return $this->ingredientRepo->update($ingredient,$data);

    }
    public function findByName($ingredient){

        return $this->ingredientRepo->findByName($ingredient);

    }
    public function delete($ingredient){

        return $this->ingredientRepo->delete($ingredient);
    }


}
