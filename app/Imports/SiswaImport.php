<?php

namespace App\Imports;

use App\Master_Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Master_Siswa([
            'nis'           => $row[0],
            'name'          => $row[1], 
            'email'         => $row[2], 
            'password'      => bcrypt($row[3]),
            'jenisKelamin'  => $row[4],
            'agama'         => $row[5]
            
            // 'nis'  => $row['nis'],
            // 'namaSiswa' => $row['namaSiswa'],
            // 'jenisKelamin' => $row['jenisKelamin'],
            // 'agama' => $row['agama'],
            // 'password' => $row['password'],
        ]);
    }

}
