<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_Walimurid extends Model
{
    protected $table = "walimurids";
 
    protected $fillable = ['niss','namewm','email','password','alamat','noHp'];
}
