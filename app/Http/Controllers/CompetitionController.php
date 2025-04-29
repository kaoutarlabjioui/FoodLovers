<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;
use App\Services\ICompetitionService;

class CompetitionController extends Controller
{
    protected ICompetitionService $competitionService;
    public function __construct( ICompetitionService $competitionService) {
        $this->competitionService = $competitionService;
    }

    public function index() {
        $competitions = $this->competitionService->getAll();
        return view('admin.admincompetition', compact('competitions'));
    }

    public function store(Request $request) {
        $this->competitionService->create($request->all());
        return redirect()->back()->with('success', 'Compétition créée');
    }

    public function inscription(Request $request)
    {
        $user = auth()->user();

        try {
            $this->competitionService->inscriptionUser($request->all(), $user);
            return redirect()->back()->with('success', 'Inscription réussie');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function choisirGagnant(Request $request)
    {
        try {
            $this->competitionService->choisirGagnant($request);
            return redirect()->back()->with('success', 'Gagnant choisi avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // public function edit($id) {
    //     $competition = $this->competitionService->getById($id);
    //     return view('admin.editcompetition', compact('competition'));
    // }



    public function updateCompetition(Request $request) {

        $this->competitionService->update( $request);
        return redirect()->back();
    }

    public function destroy(Request $request) {

        $this->competitionService->delete($request);
        return redirect()->back();
    }

    // public function showDetails(Request $request){
    //     $competition = $this->competitionService->getById($request);
    //     return view('detailcompetition',compact('competition'));
    // }

    public function show(){
        $competitions = $this->competitionService->getAll();
        return view('competition',compact('competitions'));
    }


//     public function competitionsOuvertes()
// {
//     $competitions = $this->competitionService->getCompetitionsOuvertes();
//     return view('client.clientcompetition', compact('competitions'));
// }

}

