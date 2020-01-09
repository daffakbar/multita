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
            'nis'           => $row['nis'],
            'name'          => $row['name'], 
            'email'         => $row['email'], 
            'password'      => bcrypt($row['password']),
            'jenisKelamin'  => $row['jeniskelamin'],
            'agama'         => $row['agama'],
            
            // 'nis'  => $row['nis'],
            // 'namaSiswa' => $row['namaSiswa'],
            // 'jenisKelamin' => $row['jenisKelamin'],
            // 'agama' => $row['agama'],
            // 'password' => $row['password'],
        ]);
    }

}
