<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;

class Persona extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'personas';
    protected $fillable = array('id', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'id_empresa', 
                            'cargo', 'celular', 'telefono', 'foto', 'fondo', 'identificador', 'interno', 'fax');

    
}
