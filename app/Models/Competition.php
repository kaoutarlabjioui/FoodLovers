<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'date_debut', 'date_fin'];


    
    public function recettes(){
        return $this->belongsToMany(Recette::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('status')->withTimestamps();
    }


      public function winner()
      {
          return $this->belongsTo(User::class, 'winner_id');
      }



      public function admin()
      {
          return $this->belongsTo(User::class, 'admin_id');
      }


}

