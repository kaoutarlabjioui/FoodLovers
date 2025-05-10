<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Competition;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $userCount = User::count();
        $recetteCount = Recette::count();
        $commandeCount = Commande::count();
        $competitionCount = Competition::count();


     return view('admin.layout',compact('commandeCount','recetteCount','userCount','competitionCount'));
    }

}
