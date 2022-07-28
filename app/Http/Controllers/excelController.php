<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Excel as ModelsExcel;
use Maatwebsite\Excel\Facades\Excel;


class excelController extends Controller
{





    public function excel(Request $request){
      
         $excel = $request->file('excel');
         Excel::import(new ExcelImport, $excel);

         return back()->with('cargado', 'El archivo fue cargado');
        
    }


    public function cargado(){
        $datos = DB::select("SELECT DISTINCT nombre, numero FROM excels");
        return view('welcome', compact('datos'));
    }



    public function individual($numero){
        $registros = DB::select("SELECT*FROM excels WHERE numero LIKE $numero");
        //return ModelsExcel::find($numero);
        return view('individuales', compact('registros'));
    }


    public function delete(){
        ModelsExcel::truncate();
        return back();
    }

    public function anotaciones($id){
        $anotaciones = request('anotaciones');
        //return ModelsExcel::find($id);
         DB::update("UPDATE excels SET anotaciones = '$anotaciones' WHERE id LIKE $id");

         return back();
    
    }

    public function exportar(){
        return Excel::download(new ExcelExport, 'nomina-revisada.xls');
    }

}
