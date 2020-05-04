<?php

namespace App\Imports;

use App\Master_Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Master_Siswa([
            // 'id'           => $row[0],
            // 'name'          => $row[1], 
            // 'email'         => $row[2], 
            // 'password'      => bcrypt($row[3]),
            // 'jenisKelamin'  => $row[4],
            // 'agama'         => $row[5]
            
            'id'  => $row['nis'],
            'name' => $row['nama'],
            'email' => $row['email'],
            'password' => bcrypt($row['password']),
            'jenisKelamin' => $row['jenis_kelamin'],
            'agama' => $row['agama']
        ]);
    }

}
