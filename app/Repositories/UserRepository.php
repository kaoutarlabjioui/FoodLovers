<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(){

        return User::all();

    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function create( $data): User
    {

        return User::create($data);
    }

    public function save($user){
      return  $user->save();

    }

    public function update(User $user, array $data)
    {
        return $user->update($data);
    }

    public function changeStatus($data){
        // dd($data['status']);
     $user = User::find($data['id']);
     $user->update(['status' => $data['status']]);
     $user->save();
     return $user;


    }

}
