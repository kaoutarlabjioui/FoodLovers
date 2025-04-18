<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
  protected $fillable=['nom','description'];

  public function recettes()
    {
        return $this->belongsToMany(Recette::class);
                    
    }

}
