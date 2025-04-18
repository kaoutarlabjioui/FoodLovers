<?php
namespace App\Services;
use App\Repositories\CategoryRepositoryInterface;
use App\Services\ICategoryService;

class CategoryService implements ICategoryService{

    protected CategoryRepositoryInterface $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo){
        $this->categoryRepo = $categoryRepo;
    }

    public function getAll(){
        return $this->categoryRepo->getAll();
    }

    public function getById($id){
        return $this->categoryRepo->find($id);
    }

    public function create($data){

        return $this->categoryRepo->create($data);
    }

    public function update($category, $data){
        return $this->categoryRepo->update($category,$data);
    }

    public function findByName($category){
        return $this->categoryRepo->findByName($category);
    }
    public function delete($category){
        // $categorie = Category::find($category);
        // dd($categorie);
        // if (!$categorie) {
        //     throw new \Exception("Catégorie introuvable.");
        // }
        return $this->categoryRepo->delete($category);
    }
}
