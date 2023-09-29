@extends('layouts.app')

@section('titlePage')
<h2>Crear Persona</h2>
@stop
@section('content')
<div class="container">

    <div class="card">
        <div id="type" style="display: none">{{$type}}</div>
        <div id="dataPerson" style="display: none">{{$person}}</div>
        <div class="card-header bg-secondary"><h4>{{$accion}}</h4></div>

        <div class="card-body">
            <form id="formPerson" action="{{route($ruta)}}" method="POST" enctype="multipart/form-data" >
                {{csrf_field()}}
                <fieldset>
                    <div class="form-group row mt-3">
                        <label for="primer_nombre" class="col-sm-2 col-form-label">Nombres: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mt-2" name="primer_nombre" value="{{ old('primer_apellido') }}" id="primer_nombre" placeholder="Primer nombre" required>
                            @error('primer_nombre')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mt-2" name="segundo_nombre" id="segundo_nombre" value="{{ old('segundo_nombre') }}" placeholder="Segundo nombre" >
                            @error('segundo_nombre')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="primer_apellido" class="col-sm-2 col-form-label">Apellidos: </label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mt-2" name="primer_apellido" id="primer_apellido" value="{{ old('primer_apellido') }}" placeholder="Primer apellido" required>
                            @error('primer_apellido')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control mt-2" name="segundo_apellido" id="segundo_apellido" value="{{ old('segundo_apellido') }}" placeholder="Segundo apellido" >
                            @error('segundo_apellido')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="id_empresa" class="col-form-label col-sm-2">Empresa: </label>
                        <div class="col-sm-10">
                            <select class="form-select" id="id_empresa" name="id_empresa" required>
                                <option value="">Seleccione una opción</option>
                                @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="cargo" class="col-form-label col-sm-2">Cargo: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cargo" id="cargo" value="{{ old('cargo') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="correo" class="col-sm-2 col-form-label">Correo:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="correo" id="correo" value="{{ old('correo') }}" required>
                            @error('correo')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="celular" class="col-sm-2 col-form-label">Celular:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="celular" id="celular" value="{{ old('celular') }}" required>
                        </div>

                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="interno" class="col-sm-2 col-form-label">Interno:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="interno" id="interno" value="{{ old('interno') }}" required>
                        </div>

                        <label for="fax" class="col-sm-2 col-form-label">Fax:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="fax" id="fax" value="{{ old('fax') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
                        <div class="col-sm-10 text-center">
                            @if ( $type == "edit" )
                                <img src="{{asset('images/personPhoto/'.$person->foto)}}" class="mb-2" alt="foto" height="80" width="80" >
                            @endif
                            <input type="file" class="form-control" name="foto" id="foto" value="{{ old('foto') }}" tabindex="6" >
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="fondo" class="col-sm-2 col-form-label">Fondo:</label>
                        <div class="col-sm-10 text-center">
                            @if ( $type == "edit" )
                                <img src="{{asset('images/fondoPerson/'.$person->fondo)}}" class="mb-2" alt="fondo" height="80" width="80" >
                            @endif
                            <input type="file" class="form-control" name="fondo" id="fondo" value="{{ old('fondo') }}" tabindex="6" >
                        </div>
                    </div>

                    <input type="hidden" name="id" id="id" value="" >
                    <div id="submitButton" class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary sombra-black">Guardar</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

@stop

@section('scripts')
    <script src="{{asset('js/Personas/formPerson.js')}}"></script>
@stop

