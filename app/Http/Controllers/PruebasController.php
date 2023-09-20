<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebasController extends Controller
{
    //
    public function mensaje() {
        return view('Pruebas/persona');
    }
    
    public function mensajeConNombre($nombre) {
        // return view('Pruebas/persona', compact('nombre'));
        // return view('Pruebas/persona', ['var1'=>$nombre]);
        return view('Pruebas/persona')
        ->with('var2', $nombre);
    }
    
    public function salir() {
        return "usted Salio del grupo";
    }

    public function post($num1, $num2) {
        dd($num1);
        return "los numeros son $num1, y $num2";
    }
    
    public function vb() {
        return view('vistaBootstrap');
    }
}
