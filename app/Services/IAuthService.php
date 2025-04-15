<?php
namespace App\Services;

interface IAuthService
{
    public function register(array $data);
    public function login(array $credentials);
    public function logout(string $token);
    public function getUser(string $token);
    public function updateRole(string $email, string $roleName);
}
