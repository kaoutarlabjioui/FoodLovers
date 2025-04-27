<?php namespace App\Repositories;

interface CommandeRepositoryInterface{

    public function create( $data);
    public function getAll();

}
