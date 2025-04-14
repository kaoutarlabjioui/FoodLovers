<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;


    protected $fillable=['ville','address','pays','code_postal'];

    public function user(){
        return $this->hasOne(User::class);
    }
}
