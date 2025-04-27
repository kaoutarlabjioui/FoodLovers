<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable=['prix_totale','status'];


    public function user()
    {
        return $this->belongsTo(User::class,'client_id');
    }

    public function commandesItems()
    {
        return $this->hasMany(CommandeItems::class);
    }



}


