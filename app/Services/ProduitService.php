<?php
namespace App\Services;

use App\Models\Produit;
use App\Repositories\ProduitRepository;
use App\Repositories\ProduitRepositoryInterface;

class ProduitService implements IProduitService{
protected ProduitRepositoryInterface $produitRepo;

    public function __construct(ProduitRepositoryInterface $produitRepo){
        $this->produitRepo = $produitRepo;
    }

    public function getAll(){
        return $this->produitRepo->getAll();
    }
    public function create($data){
        $image =$data['photo'];
        $extension = $image->getClientOriginalExtension();
        $fileName = 'produit_'.time().'.'.$extension;
        $path = $image->storeAs('uploads',$fileName,'public');
        $data['photo'] = $path;
        $produit = new Produit();
        $produit->nom = $data['nom'];
        $produit->description = $data['description'];
        $produit->prix = $data['prix'];
        $produit->stock = $data['stock'];
        $produit->photo = $data['photo'];

    return $this->produitRepo->create($produit);
    }
    public  function getById($id){
        return $this->produitRepo->find($id);
    }
    public function getByName($produit){
        return $this->produitRepo->getByName($produit);
    }
    public function update( $data){

        $image =$data['photo'];
        $extension = $image->getClientOriginalExtension();
        $fileName = 'produit_'.time().'.'.$extension;
        $path = $image->storeAs('uploads',$fileName,'public');
        $data['photo'] = $path;
        $produit = $this->produitRepo->find($data['id']);

        $produit->nom = $data['nom'];
        $produit->description = $data['description'];
        $produit->prix = $data['prix'];
        $produit->stock = $data['stock'];
        $produit->photo =  $data['photo'];
        return $this->produitRepo->update($produit);
    }
    public function delete($produit){
        return $this->produitRepo->delete($produit);
    }


}
