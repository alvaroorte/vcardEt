<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Carbon;

class EmpresaController extends Controller
{
    public function formEmpresa() {
        $ruta = "createEmpresa";
        $accion = "Crear nueva Empresa";
        return view('Empresa/formEmpresa', ['ruta' => $ruta, 'accion' => $accion, 'type' => "create", 'empresa' => ""]);
    }
    
    public function formEmpresaEdit($idEmpresa) {
        $ruta = "editEmpresa";
        $accion = "Editar Empresa";
        $empresa = Empresa::find($idEmpresa);
        return view('Empresa/formEmpresa', ['ruta' => $ruta, 'accion' => $accion, 'type' => "edit", 'empresa' => $empresa]);
    }

    public function createEmpresa(Request $req) {

        $empresa = new Empresa();
        $empresa->nombre = $req->nombre;
        $empresa->sigla = $req->sigla;
        $empresa->pagina_web = $req->pagina_web;
        $empresa->save();

        return redirect()->route('listEmpresa');
    }
    
    public function editEmpresa(Request $req) {
        $empresa = Empresa::find($req->id);

        $empresa->nombre = $req->nombre;
        $empresa->sigla = $req->sigla;
        $empresa->pagina_web = $req->pagina_web;
        $empresa->save();

        return redirect()->route('listEmpresa');
    }

    public function listEmpresa() {
        $cantidad = Empresa::all()->count();
        $empresas = Empresa::orderBy('id','asc')->get();
        return view('Empresa.listEmpresa',compact('cantidad','empresas'));
    }
    
    public function deleteEmpresa($id) {
        Empresa::find($id)->delete();
        return redirect()->route('listEmpresa');
    }
    
}
