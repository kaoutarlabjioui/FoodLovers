<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;


    protected $fillable= [    'titre',
    'description',
    'instruction',
    'photo',

];

public function user()
{
    return $this->belongsTo(User::class);
}

 public function category(){
    return $this->belongsTo(Category::class);
 }

 public function ingredients(){
    return $this->belongsToMany(Ingredient::class);
 }

 public function tags(){
    return $this->belongsToMany(Tag::class);
 }

}
