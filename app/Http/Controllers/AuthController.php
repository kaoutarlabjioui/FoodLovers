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
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
            'role_name'     => 'nullable|string',
        ]);

        try{
            $result = $this->iAuthService->register($request->all());
            session(['jwt_token' => $result['token']]);
            return redirect()->route('profile')->with('success', 'Inscription reussie');
        }catch(Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erreur lors de l inscription']);
        }

    }

    public function login(Request $request)
    {
        dd($request);
        $credentials = $request->only('email', 'password');
        $result = $this->iAuthService->login($credentials);
        if(!$result){
            return redirect()->back()->withErrors(['error' => 'Email ou mot de passe invalide']);
        }

        session(['jwt_token' => $result['token']]);
        return view('profile')->with('success', 'Connexion reussie');
    }

    public function logout(Request $request)
    {
        $token = session('jwt_token');
        $success = $this->iAuthService->logout($token);
        session()->forget('jwt_token');
        return redirect()->route('login')->with('success', $success ? 'Deconnexion reussie' : 'Erreur lors de la deconnexion');
    }







}


