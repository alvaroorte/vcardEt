@extends('layouts.app')
@section('titlePage')
<h2>Gestión de Empresa</h2>
@stop
@section('content')
<div class="card ">
    <div class="card-header bg-secondary"><h4>Lista de empresas</h4></div>
    <div class="card-body">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                        <div class="row">
                            <div class="col-8">
                                @can('admin')
                                    <a href="{{route('formEmpresa')}}"><button class='btn btn-outline-primary me-2 sombra-black'><span class="fa fa-plus" aria-hidden="true"></span> Nueva Empresa</button></a>
                                @endcan
                                <button type="button" class="btn btn-secondary">
                                    <span id="total" class="badge bg-warning">{{$cantidad}}</span> Empresas Registradas
                                </button>
                            </div>
        
                        </div>
                        <br>
                            <div  class="table-responsive">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sigla</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Página Web</th>
                                            @can('admin')
                                                <th class="text-center">Opciones</th>
                                            @endcan
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($empresas as $empresa)
                                        <tr>
                                            <td class="text-center">{{$empresa->sigla}}</td>
                                            <td class="text-center">{{$empresa->nombre}}</td>
                                            <td class="text-center">{{$empresa->pagina_web}}</td>
                                            @can('admin')
                                                <td class="text-center">
                                                    <a type="button" href="{{route('formEmpresaEdit', ['idEmpresa' => $empresa->id])}}"><button class="btn btn-warning btn-sm sombra-black" type="submit"><i class="fa fa-pencil"></i></button></a> 
                                                    <form class="formDeleteEmpresa d-inline" action="{{route('deleteEmpresa', ['idEmpresa' => $empresa->id])}}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger btn-sm sombra-black" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            @endcan
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@stop

@section('scripts')
    <script src="{{asset('js/Empresa/listEmpresa.js')}}"></script>
@stop