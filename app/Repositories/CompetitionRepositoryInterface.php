<?php
namespace App\Repositories;

interface CompetitionRepositoryInterface {
    public function getAll();
    public function getById($id);
    public function create( $data);
    public function update($data);
    public function delete($id);


}
