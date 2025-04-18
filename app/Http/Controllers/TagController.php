<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Services\ITagService;
use Illuminate\Http\Request;

class TagController extends Controller
{

    protected ITagService $tagService;

    public function __construct(ITagService $tagService)
    {
        $this->tagService = $tagService;
    }

  public function index(){

    $tags = $this->tagService->getAll();
    return view ('admin.admintag',compact('tags'));

  }

  public function store(StoreTagRequest $request){

       $tag= $request->validated();
      $this->tagService->create($tag);

      return redirect()->back()->with('success','tag ajoutee');

  }


    public function edit($id){

        $tag = $this->tagService->getById($id);
        return view("admin.edittag",compact('tag'));
    }


    public function update(UpdateTagRequest $request){
        $data = $request->validated();

        $tag= $this->tagService->getById($data['id']);
        $this->tagService->update($tag,$data);

        return redirect('/admin/admintag');

    }
    public function destroy(Request $tag){

        $this->tagService->delete($tag);
        return redirect()->back()->with('success','Tag supprimee');
    }


}
