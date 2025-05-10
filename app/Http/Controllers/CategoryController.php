<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\ICategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected ICategoryService $categoryService;


    public function __construct( ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories =$this->categoryService->getAll();
        return view('admin.admincategory',compact('categories'));

    }
    public function store(StoreCategoryRequest $request)
    {
           $category = $request->validated();

            $this->categoryService->create($category);

            return redirect()->back()->with('success' , 'Categorie ajoutee');


    }

    public function edit($id){
      $category=  $this->categoryService->getById($id);
      return view("admin.editcategory",compact('category'));

    }

    public function update(UpdateCategoryRequest $request)
    {


        $data = $request->validated();

        $category = $this->categoryService->getById($data['id']);
       $this->categoryService->update($category,$data);
       return redirect('/admin/admincategory')->with("success",'Categorie modifier');
    }


    public function destroy(Request $category)
    {

        $this->categoryService->delete($category);

        return redirect()->back()->with('success', 'Categorie supprimee');
    }










}
