<?php

namespace App\Services;

use App\Models\Competition;
use App\Repositories\CompetitionRepositoryInterface;
use App\Services\ICompetitionService;

class CompetitionService implements ICompetitionService
{
    public function __construct(protected CompetitionRepositoryInterface $competitionRepo) {}

    public function getAll() {
        return $this->competitionRepo->getAll();
    }

    public function getById($id) {
        return $this->competitionRepo->getById($id);
    }

    public function create( $data) {
        $admin= auth()->user();
        $competition = new Competition();
        $competition->name =$data['name'];
        $competition->description =$data['description'];
        $competition->date_debut =$data['date_debut'];
        $competition->date_fin =$data['date_fin'];
        $competition->admin()->associate($admin);
        return $this->competitionRepo->create($competition);
    }

    public function update( $data) {
        return $this->competitionRepo->update( $data);
    }

    public function delete($data) {

        return $this->competitionRepo->delete($data['id']);
    }

    public function inscriptionUser($data,$user){

        $competition = $this->competitionRepo->getById($data['competition_id']);

        if(!$competition){
            throw new \Exception('competition non trouvee .');
        }

        if($competition->date_fin < now()){
            throw new \Exception('la competition est teriminee');
        }

        if($competition->users()->where('user_id',$user->id)->exists()){
            throw new \Exception('Vous etes deja inscrit  a cette competition.');

        }

        $competition->users()->attach($user->id,['status'=>'inscrit']);
    }

    public function choisirGagnant($data){


        $competition = $this->competitionRepo->getById($data['competition_id']);

        if($competition->date_fin > now()){
            throw new \Exception('la competition n est pas encore terminee.');

        }

        $participants = $competition->users()->wherePivot('status','inscrit')->get();
        // dd($participants);
        if($participants->isEmpty()){
            throw new \Exception('Aucun participant inscrit.');
        }

        $gagnant = $participants->random();
        $competition->winner()->associate($gagnant);

        $competition->save();

        foreach($participants as $participant){
            $status = ($participant->id === $gagnant->id)?'gagné':'perdu';
            $competition->users()->updateExistingPivot($participant->id,['status'=>$status]);
        }
        return $gagnant;

    }


    public function getCompetitionsOuvertes()
{
    return Competition::where('date_fin', '>=', now())->get();
}









}
