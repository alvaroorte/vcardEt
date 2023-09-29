<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Empresa;
use Illuminate\Support\Carbon;

class PersonasController extends Controller
{
    public function formPerson() {
        $ruta = "createPerson";
        $accion = "Crear nueva Persona";
        $empresas = Empresa::all();
        return view('Personas/formPerson', ['ruta' => $ruta, 'accion' => $accion, 'type' => "create", 'person' => "", 'empresas' => $empresas]);
    }
    
    public function formPersonEdit($idPerson) {
        $ruta = "editPerson";
        $accion = "Editar Persona";
        $person = Persona::find($idPerson);
        $empresas = Empresa::all();
        return view('Personas/formPerson', ['ruta' => $ruta, 'accion' => $accion, 'type' => "edit", 'person' => $person, 'empresas' => $empresas]);
    }

    public function createPerson(Request $req) {
        
        $req->validate([
            'correo' => 'unique:personas',
        ]);
        $identificador = uniqid(); // Genera una cadena única basada en la hora actual
        // Agrega una parte aleatoria adicional para mayor unicidad
        $identificador .= bin2hex(random_bytes(4));

        $file = $req->file('foto');
        if ( $file != "" ) {
            $img = $file->getClientOriginalName();
            $nombreFoto = str_replace(':', '_', Carbon::now()).$img;
            $file->move(public_path('images/personPhoto'), $nombreFoto);
        } else {
            $nombreFoto = "sin-foto.png";
        }
       
        $file = $req->file('fondo');
        if ( $file != "" ) {
            $img = $file->getClientOriginalName();
            $nombreFondo = str_replace(':', '_', Carbon::now()).$img;
            $file->move(public_path('images/fondoPerson'), $nombreFondo);
        } else {
            $nombreFondo = "defaultFondo.jpg";
        }

        $person = new Persona();
        $person->primer_nombre = $req->primer_nombre;
        $person->segundo_nombre = $req->segundo_nombre;
        $person->primer_apellido = $req->primer_apellido;
        $person->segundo_apellido = $req->segundo_apellido;
        $person->correo = $req->correo;
        $person->celular = $req->celular;
        $person->telefono = $req->telefono;
        $person->id_empresa = $req->id_empresa;
        $person->cargo = $req->cargo;
        $person->interno = $req->interno;
        $person->fax = $req->fax;
        $person->foto = $nombreFoto;
        $person->fondo = $nombreFondo;
        $person->identificador = $identificador;
        $person->save();

        

        return redirect()->route('listPeople');
    }
    
    public function editPerson(Request $req) {
        $person = Persona::find($req->id);

        $file = $req->file('foto');
        if ( $file != "" ) {
            $img = $file->getClientOriginalName();
            $nombreFoto = str_replace(':', '_', Carbon::now()).$img;
            $file->move(public_path('images/personPhoto'), $nombreFoto);
            $person->foto = $nombreFoto;
        } 

        $file = $req->file('fondo');
        if ( $file != "" ) {
            $img = $file->getClientOriginalName();
            $nombreFondo = str_replace(':', '_', Carbon::now()).$img;
            $file->move(public_path('images/fondoPerson'), $nombreFondo);
            $person->fondo = $nombreFondo;
        } 
        
        $person->primer_nombre = $req->primer_nombre;
        $person->segundo_nombre = $req->segundo_nombre;
        $person->primer_apellido = $req->primer_apellido;
        $person->segundo_apellido = $req->segundo_apellido;
        $person->correo = $req->correo;
        $person->celular = $req->celular;
        $person->telefono = $req->telefono;
        $person->id_empresa = $req->id_empresa;
        $person->cargo = $req->cargo;
        $person->interno = $req->interno;
        $person->fax = $req->fax;
        $person->save();

        return redirect()->route('listPeople');
    }

    public function listPeople() {
        $cantidad = Persona::all()->count();
        $people = Persona::orderBy('id','asc')->get();
        return view('Personas.listPeople',compact('cantidad','people'));
    }
    
    public function deletePerson($id) {
        Persona::find($id)->delete();
        return redirect()->route('listPeople');
    }
    
    public function infoPerson($identificador) {
        $person = Persona::join('empresas', 'empresas.id', 'personas.id_empresa')->where('identificador','=', $identificador)->first();
        return view('Personas.infoPerson',compact('person'));
    }
}
