<?php

namespace App\Imports;

use App\Master_Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

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
            'nis' => $row[1],
            'name' => $row[2], 
            'email' => $row[3], 
            'password' => bcrypt($row[4]),
            'jenisKelamin' => $row[5],
            'agama' => $row[6],
            
            // 'nis'  => $row['nis'],
            // 'namaSiswa' => $row['namaSiswa'],
            // 'jenisKelamin' => $row['jenisKelamin'],
            // 'agama' => $row['agama'],
            // 'password' => $row['password'],
        ]);
    }

}
