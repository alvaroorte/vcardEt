<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonasController extends Controller
{
    public function formulario() {
        return view('Personas/formulario');
    }
    
    public function guardarPersona(Request $request) {
        $request->validate( [
            'name' => ['required']
        ]);
        echo "todo salio bien";
    }
}
