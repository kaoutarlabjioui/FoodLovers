<?php

namespace App\Repositories;

use App\Repositories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function getAll()
    {
        return Category::all();
    }
    public function find($id)
    {
        return Category::findOrFail($id);
    }
    public function create($data)
    {

        return Category::create($data);
    }

    public function update($category, $data)
    {
        return $category->update($data);
    }

    public function findByName($category)
    {

        $categorie = Category::where("title", "=", $category)->first();
        return $categorie;
    }
    public function delete($category)
    {
        //  dd($category);

        $categorie = Category::whereIn('id', $category)->first();

        return $categorie->delete();
    }
}
