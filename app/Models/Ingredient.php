<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['ingredient','etat'];


    public function recettes(){
        return $this->belongsToMany(Recette::class);
    }
}
