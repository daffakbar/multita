<?php

namespace App\Imports;

use App\Master_Walimurid;
use Maatwebsite\Excel\Concerns\ToModel;

class WalmurImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Master_Walimurid([
            'nis' => $row[1], 
            'name' => $row[2], 
            'email' => $row[3],
            'password' => $row[4],
            'alamat' => $row[5],
            'noHp' => $row[6],
        ]);
    }
}
