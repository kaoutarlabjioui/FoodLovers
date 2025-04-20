<?php
namespace App\Services;

use App\Repositories\TagRepositoryInterface;

class TagService implements ITagService{

    protected TagRepositoryInterface $tagRepo;
public function __construct(TagRepositoryInterface $tagRepo){
    $this->tagRepo = $tagRepo;
}


public function getAll(){
    return $this->tagRepo->getAll();
}

public function getById($id){
    return $this->tagRepo->find($id);
}

public function create($data){

    return $this->tagRepo->create($data);
}

public function update($tag, $data){
    return $this->tagRepo->update($tag,$data);
}

public function findByName($tag)
{
    return $this->tagRepo->findByName($tag);
}

public function delete($tag){

    return $this->tagRepo->delete($tag);
}


}
