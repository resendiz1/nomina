<?php

use App\Http\Controllers\excelController;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/cargando', [excelController::class, 'excel'])->name('excel');
Route::get('/', [excelController::class, 'cargado'])->name('cargado');
Route::get('/individual/{id}', [excelController::class, 'individual'])->name('ver');
Route::get('/delete', [excelController::class, 'delete'])->name('delete');