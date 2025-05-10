<?php


namespace App\Repositories;

use App\Models\Competition;
use App\Repositories\CompetitionRepositoryInterface;

class CompetitionRepository implements CompetitionRepositoryInterface
{
    public function getAll() {
        return Competition::all();
    }

    public function getById($id) {
        return Competition::findOrFail($id);
    }

    public function create($competition) {
        return $competition->save() ;
    }

    public function update($data){
        // dd($data['date_fin']);
        $competition = Competition::find($data['id']);
        $competition->update(["date_fin"=>$data['date_fin']]);
        return $competition;
    }

    public function delete($id) {
        return Competition::destroy($id);
    }
}
