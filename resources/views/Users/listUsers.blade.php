@extends('layouts.app')
@section('titlePage')
<h2>Gestión de Usuarios</h2>
@stop
@section('content')
<div class="card ">
    <div class="card-header bg-secondary"><h4>Lista de usuarios</h4></div>
    <div class="card-body">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                        <div class="row">
                            <div class="col-8">
                                @can('admin')
                                    <a href="{{route('users.create')}}" ><button class='btn btn-outline-primary me-2 sombra-black'><span class="fa fa-plus" aria-hidden="true"></span> Nuevo Usuario</button></a>
                                @endcan
                                <button type="button" class="btn btn-secondary">
                                    <span id="total" class="badge bg-warning">{{$cantidad}}</span> Usuarios Registrados
                                </button>
                            </div>
        
                        </div>
                        <br>
                            <div  class="table-responsive">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Correo</th>
                                            @can('admin')
                                                <th class="text-center">Opciones</th>
                                            @endcan
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td class="text-center">{{$user->id}}</td>
                                            <td class="text-center">{{$user->name}}</td>
                                            <td class="text-center">{{$user->email}}</td>
                                            @can('admin')
                                                <td class="text-center">
                                                    <a class="btn btn-warning btn-sm" href="{{route('users.edit', $user)}}"><i class="fa fa-pencil"></i></a>
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