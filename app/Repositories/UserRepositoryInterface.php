<?php
namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findByEmail(string $email);
    public function create(array $data);
    public function save($user);
    public function getAll();
    public function update(User $user, array $data);
}
