<?php
namespace App\Repositories;

use App\Models\Tag;

class TagRepository implements TagRepositoryInterface{
    public function getAll()
    {
        return Tag::all();
    }
    public function find( $id){
        return Tag::findOrFail($id);
    }
    public function create($data){

        return Tag::create($data);
    }

    public function update($Ttag,$data){
        return $Ttag->update($data);
    }


    public function findByName($tag)
    {
       $tags = Tag::where('nom','=',$tag)->first();

       return $tags;
    }

    public function delete( $tag){
//  dd($Ttag);

      $tag =Tag::whereIn('id',$tag)->first();

       return $tag->delete();


    }
}

