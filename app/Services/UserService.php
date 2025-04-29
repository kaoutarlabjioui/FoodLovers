<?php
namespace App\Services;

use App\Repositories\AddressRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class UserService implements IUserService{

    protected AddressRepositoryInterface $addressRepo;
    protected UserRepositoryInterface $userRepo;

    public function __construct(AddressRepositoryInterface $addressRepo, UserRepositoryInterface $userRepo )
    {
        $this->addressRepo = $addressRepo;
        $this->userRepo = $userRepo;
    }

    public function storeAddress($data){

         $user = auth()->user();

        $address=   $this->addressRepo->create($data);

        $user->address()->associate($address);

        $this->userRepo->save($user);

       return $user;

    }

    public function updateStatus($data){
        
        return $this->userRepo->changeStatus($data);

    }

}
