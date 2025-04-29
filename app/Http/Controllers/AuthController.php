<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Services\IAuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    protected IAuthService $iAuthService;
    public function __construct( IAuthService $iAuthService)
    {
        $this->iAuthService = $iAuthService;
    }

    public function index()
    {
        return view('login');
    }

    public function showRegisterForm(){
        return view('register');
    }


    public function register(Request $request)
    {

        $request->validate([
            'last_name' => 'required',
            'first_name'=> 'required',
            'email'    => 'required|email',
            'password' => 'required',
            'role_name'=> 'nullable|string',
        ]);

        try{
           $this->iAuthService->register($request->all());

            return redirect()->route('login')->with('success', 'Inscription reussie');
        }catch(Exception $e) {
            // dd($e);
            return redirect()->back()->withErrors(['error' => 'Erreur lors de l inscription']);
        }

    }

    public function login(Request $request)
    {
        // dd($request);
        $credentials = $request->only('email', 'password');

        $result = $this->iAuthService->login($credentials);

        if(!$result){
            return redirect()->back()->withErrors(['error' => 'Email ou mot de passe invalide']);
        }

        $user = $result['user'];

        if ($user->role->role_name === 'admin') {
            return redirect('/admin/dashboard')->with('success', 'Connexion réussie en tant qu\'admin');

        } elseif ($user->role->role_name === 'user' && $user->status === 'active') {
            return redirect('/profile')->with('success', 'Connexion réussie en tant qu\'utilisateur');
        }elseif($user->role->role_name === 'user' && $user->status != 'active'){
            return redirect('/userdesactive');
        }

    }

    public function logout()
    {
        $success = $this->iAuthService->logout();
        return redirect('/')->with('success', $success ? 'Deconnexion reussie' : 'Erreur lors de la deconnexion');
    }







}


