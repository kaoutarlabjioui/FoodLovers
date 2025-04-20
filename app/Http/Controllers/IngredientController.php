<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient;
use App\Services\IIngredientService;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    protected IIngredientService $ingredientService;
    public function __construct(IIngredientService $ingredientService)
    {
        $this->ingredientService = $ingredientService;
    }
    public function index()
    {
        $ingredients = $this->ingredientService->getAll();

        return view("admin.adminingredient", compact('ingredients'));
    }


    public function store(StoreIngredientRequest $request)
    {
        $data = $request->validated();

        $this->ingredientService->create($data);
        return redirect()->back();
    }



    // public function show(Ingredient $ingredient)
    // {

    // }


    public function edit($id)
    {
        $ingredient = $this->ingredientService->getById($id);
        return view("admin.editingredient", compact("ingredient"));
    }


    public function update(UpdateIngredientRequest $request)
    {

        $data = $request->validated();
        $ingredient = $this->ingredientService->getById($data['id']);
        $this->ingredientService->update($ingredient, $data);

        return redirect('/admin/adminingredient');
    }


    public function destroy(Request $ingredient)
    {
        $this->ingredientService->delete($ingredient);
        return redirect()->back();
    }
}
