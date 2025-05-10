<?php

namespace App\Services;

interface ICompetitionService {
    public function getAll();
    public function getById($id);
    public function create( $data);
    public function update( $data);
    public function delete($id);
    public function inscriptionUser($data,$user);

    public function choisirGagnant($data);
}
