<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatorDepartamento;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Inertia\Inertia;
class DepartamentoController extends Controller
{

    public function index()
    {
        $departamentos = Departamento::all()->map(function ($departamento){
            $departamento["url_edit"]= route("departamento.edit",compact("departamento"));
            $departamento["url_delete"]= route("departamento.destroy", compact("departamento"));
            return $departamento;
        });
        $url_create=route("departamento.create");
        return Inertia::render("Departamento/Index",compact("departamentos","url_create"));
    }
    public function create()
    {
        $url_store= route("departamento.store");
        $url_index= route("departamento.index");
        return Inertia::render("Departamento/Create",compact("url_store","url_index"));
    }
    public function store(ValidatorDepartamento $request)
    {
        Departamento::create($request->all());
        return redirect()->route("departamento.index");
    }

    public function edit(Departamento $departamento)
    {
        $url_index= route("departamento.index");
        $url_update= route("departamento.update", $departamento);
        return Inertia::render("Departamento/Edit",compact("departamento","url_index","url_update"));
    }
    public function update(ValidatorDepartamento $request, Departamento $departamento)
    {
        $departamento->update($request->all());
        return redirect()->route("departamento.index");
    }

    public function destroy(Departamento $departamento)
    {
        try{
            $departamento->delete();
            
        }catch(\Exception $e){
            
        }finally{
            return redirect()->route("departamento.index");
        }
    }
}
