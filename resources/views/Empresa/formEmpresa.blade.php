@extends('layouts.app')

@section('titlePage')
<h2>Datos de Empresa</h2>
@stop
@section('content')
<div class="container">

    <div class="card">
        <div id="type" style="display: none">{{$type}}</div>
        <div id="dataEmpresa" style="display: none">{{$empresa}}</div>
        <div class="card-header bg-secondary"><h4>{{$accion}}</h4></div>

        <div class="card-body">
            <form id="formEmpresa" action="{{route($ruta)}}" method="POST" enctype="multipart/form-data" >
                {{csrf_field()}}
                <fieldset>
                    <div class="form-group row mt-3">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mt-2" name="nombre" value="" id="nombre" placeholder="Nombre de Empresa" required>
                            @error('nombre')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="sigla" class="col-sm-2 col-form-label">Sigla: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mt-2 text-uppercase" name="sigla" id="sigla" value="" placeholder="SIGLA" required>
                            @error('sigla')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="pagina_web" class="col-form-label col-sm-2">Página Web: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mt-2" name="pagina_web" id="pagina_web" value="" placeholder="ejemplo.com" required>
                            @error('pagina_web')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
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
    <script src="{{asset('js/Empresa/formEmpresa.js')}}"></script>
@stop

