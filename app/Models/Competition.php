<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'date_debut', 'date_fin'];

    public function recettes(){
        return $this->belongsToMany(Recette::class);
    }








}

