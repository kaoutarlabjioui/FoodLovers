<?php
namespace App\Services;

use App\Models\Role;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService implements IAuthService
{
    protected UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register($data){

        $roleName = $data['role_name']??'user';
        $role =Role::firstORCreate(['role_name'=>$roleName]);
        $userData = [
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data ['email'],
            'password'=>Hash::make($data['password']),
        ];
        // dd($userData);
        $user = $this->userRepo->create($userData);
        $user->role()->associate($role);
        $user->save();

           Auth::login($user);
        return [
            'user'=>$user->load('role'),
        ];


    }

        public function login($credentials){

            if(!Auth::attempt($credentials)){
                return null;
            }

            return [
                'user'  => auth()->user(),
            ];

        }



        public function  logout (){

            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return true;
        }

        public function updateRole(string $email, string $roleName)
        {
            $user = $this->userRepo->findByEmail($email);
            $role = Role::where('role_name', $roleName)->firstOrFail();

            $user->role()->associate($role);
            $user->save();

            return $user;
        }

}
