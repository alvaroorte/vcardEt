@extends('layouts.app')

@section('titlePage')
<h2>Gestión de Persona</h2>
@stop
@section('content')
<div class="card ">
    <div class="card-header bg-secondary"><h4>Lista de personas</h4></div>
    <div class="card-body">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                        <div class="row">
                            <div class="col-8">
                                @can('persona.create')
                                    <a href="{{route('formPerson')}}" data-toggle="modal" ><button class='btn btn-outline-primary sombra-black me-2'><span class="fa fa-plus" aria-hidden="true"></span> Nueva Persona</button></a>
                                @endcan
                                <button type="button" class="btn btn-secondary">
                                    <span id="total" class="badge bg-warning">{{$cantidad}}</span> Personas Registradas
                                </button>
                            </div>
        
                        </div>
                        <br>
                            <div  class="table-responsive">
                                <table class="table table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Nombres</th>
                                            <th class="text-center">Apellidos</th>
                                            <th class="text-center">Correo</th>
                                            <th class="text-center">Celular</th>
                                            <th class="text-center">teléfono</th>
                                            <th class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($people as $persona)
                                        <tr>
                                            <td class="text-center"><img class="img-circle" src="{{asset('images/personPhoto/'.$persona->foto)}}" alt="foto" height="50" width="50" ></td>
                                            <td class="text-center">{{$persona->primer_nombre}} {{$persona->segundo_nombre}}</td>
                                            <td class="text-center">{{$persona->primer_apellido}} {{$persona->segundo_apellido}}</td>
                                            <td class="text-center">{{$persona->correo}}</td>
                                            <td class="text-center">{{$persona->celular}}</td>
                                            <td class="text-center">{{$persona->telefono}}</td>
                                            <td class="text-center">
                                                <a type="button" href="{{route('infoPerson', ['identificador' => $persona->identificador])}}"><button class="btn btn-info btn-sm sombra-black" type="submit"><i class="fa fa-eye"></i></button></a> 
                                                @can('persona.formEdit')<a id="buttonPersonEdit" type="button" href="{{route('formPersonEdit', ['idPerson' => $persona->id])}}"><button class="btn btn-warning btn-sm sombra-black" type="submit"><i class="fa fa-pencil"></i></button></a> @endcan
                                                @can('persona.delete')
                                                    <form class="formDeletePerson d-inline" action="{{route('deletePerson', ['idPerson' => $persona->id])}}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger btn-sm sombra-black" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                @endcan
                                            </td>
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
    <script src="{{asset('js/Personas/listPeople.js')}}"></script>
@stop