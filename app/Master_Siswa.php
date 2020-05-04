<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_Siswa extends Model
{
    protected $table = "siswas";
 
    protected $fillable = ['id','name','email','password','jenisKelamin','agama'];
}
