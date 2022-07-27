<?php

namespace App\Imports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Excel([
            'numero' => $row[0],
            'nombre' => $row[1],
            'tiempo' => $row[2],
            'estado' => $row[3],
            'dispositivos' => $row[4],
            'tipo' => $row[5]
         ]);
    }
}
