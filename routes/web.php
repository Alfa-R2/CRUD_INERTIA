<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route("departamento.index");
});
Route::resource("Departamentos",DepartamentoController::class)->names("departamento")->parameters(["Departamentos"=>"departamento"]);
Route::resource("Empleados",EmpleadoController::class)->names("empleado")->parameters(["Empleados"=>"empleado"]);
Route::controller(EmpleadoController::class)->group(function () {
    Route::get("graficos","empleadoPorDepartamento")->name("empleado.graficos");
    Route::get("reportes","reportes")->name("empleado.reportes");
});
