<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'prix', 'photo','stock'];

    public function commandeItems()
    {
        return $this->hasMany(CommandeItems::class);
    }
}
