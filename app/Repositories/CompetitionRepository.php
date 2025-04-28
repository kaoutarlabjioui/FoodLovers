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

    public function create(array $data) {
        return Competition::create($data);
    }

    public function update($id, array $data) {
        $competition = Competition::findOrFail($id);
        $competition->update($data);
        return $competition;
    }

    public function delete($id) {
        return Competition::destroy($id);
    }
}
