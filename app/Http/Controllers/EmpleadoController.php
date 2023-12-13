<?php
namespace App\Http\Controllers;
use App\Http\Requests\ValidatorEmpleados;
use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados= Empleado::select(DB::raw("empleados.*, departamentos.nombre as 'Departamento'"))
        ->join("departamentos","empleados.id_departamento","=","departamentos.id")->orderby("id","desc")
        ->paginate(10);
        $departamentos=Departamento::all();
        return Inertia::render("Empleado/Index", compact("empleados","departamentos") );
    }
    public function store(ValidatorEmpleados $request)
    {
        Empleado::create($request->all());
        return redirect()->route("empleado.index");
        
    }
    public function update(ValidatorEmpleados $request, Empleado $empleado)
    {
        $empleado->update($request->all());
        return redirect()->route("empleado.index");
    }
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        redirect()->route("empleado.index");
    }
    public function empleadoPorDepartamento(){
        $data= Empleado::select(DB::raw("count(empleados.id) as 'Count', departamentos.nombre"))
        ->join("departamentos","empleados.id_departamento","=","departamentos.id")
        ->groupBy("departamentos.nombre")->get();
        return Inertia::render("Empleado/Grafico", compact("data"));
    }
    public function reportes(){
        $empleados= Empleado::select(DB::raw("empleados.*, departamentos.nombre as 'Departamento'"))
        ->join("departamentos","empleados.id_departamento","=","departamentos.id")
        ->get();
        $departamentos=Departamento::all();
        return Inertia::render("Empleado/Reporte", compact("empleados","departamentos") );
    }
}
