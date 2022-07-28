<?php

namespace App\Exports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Excel::select("numero", 'nombre', 'tiempo', 'estado', 'dispositivos', 'tipo', 'anotaciones')->get();
    }
}
