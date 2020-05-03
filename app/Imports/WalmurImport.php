<?php

namespace App\Imports;

use App\Master_Walimurid;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WalmurImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Master_Walimurid([
            'niss' => $row['niss'], 
            'namewm' => $row['namewm'], 
            'email' => $row['email'],
            'password' => bcrypt($row['password']),
            'alamat' => $row['alamat'],
            'noHp' => $row['nomerhp']
        ]);

        // return new Master_Walimurid([
        //     'name' => $row[1], 
        //     'email' => $row[2],
        //     'password' => bcrypt($row[3]),
        //     'alamat' => $row[4],
        //     'noHp' => $row[5],
        // ]);
    }
}
