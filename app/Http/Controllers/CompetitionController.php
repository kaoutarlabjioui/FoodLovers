<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;
use App\Services\ICompetitionService;

class CompetitionController extends Controller
{
    public function __construct(protected ICompetitionService $competitionService) {}

    public function index() {
        $competitions = $this->competitionService->getAll();
        return view('competition.index', compact('competitions'));
    }

    public function create() {
        return view('competition.create');
    }

    public function store(Request $request) {
        $this->competitionService->create($request->all());
        return redirect()->route('competitions.index');
    }

    public function edit($id) {
        $competition = $this->competitionService->getById($id);
        return view('competition.edit', compact('competition'));
    }

    public function update(Request $request, $id) {
        $this->competitionService->update($id, $request->all());
        return redirect()->route('competitions.index');
    }

    public function destroy($id) {
        $this->competitionService->delete($id);
        return redirect()->route('competitions.index');
    }
}

