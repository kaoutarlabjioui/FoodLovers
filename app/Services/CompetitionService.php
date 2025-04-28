<?php

namespace App\Services;

use App\Repositories\CompetitionRepositoryInterface;
use App\Services\ICompetitionService;

class CompetitionService implements ICompetitionService
{
    public function __construct(protected CompetitionRepositoryInterface $competitionRepo) {}

    public function getAll() {
        return $this->competitionRepo->getAll();
    }

    public function getById($id) {
        return $this->competitionRepo->getById($id);
    }

    public function create(array $data) {
        return $this->competitionRepo->create($data);
    }

    public function update($id, array $data) {
        return $this->competitionRepo->update($id, $data);
    }

    public function delete($id) {
        return $this->competitionRepo->delete($id);
    }
}
