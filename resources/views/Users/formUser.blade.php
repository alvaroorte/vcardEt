@extends('layouts.app')

@section('titlePage')
<h2>Datos de Usuario</h2>
@stop
@section('content')
<div class="container">

    <div class="card">
        <div id="type" style="display: none">{{$type}}</div>
        <div id="dataUser" style="display: none">{{$user}}</div>
        <div class="card-header bg-secondary"><h4>{{$accion}}</h4></div>

        <div class="card-body"> 
            {{-- {{route('formEmpresaEdit', ['idEmpresa' => $empresa->id])}} --}}
            <form id="formUser" action="{{route($ruta)}}" method="POST">
                {{csrf_field()}}
                <fieldset>
                    <div class="form-group row mt-3">
                        <label for="name" class="col-sm-2 col-form-label">Nombre: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mt-2" name="name" value="{{old('name')}}" id="name" placeholder="Nombre de Usuario" required>
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="email" class="col-sm-2 col-form-label">Correo: </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control mt-2" name="email" value="{{old('email')}}" id="email" placeholder="Ej. ejemplo@gmail.com" required>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="password" class="col-sm-2 col-form-label">Contraseña: </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mt-2 " name="password" value="{{old('password')}}" id="password" disabled @if ($type == 'create')
                                required
                            @endif >
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        @if ( $type == 'edit')
                            <div class="col-sm-1 " data-bs-toggle="tooltip" data-bs-original-title="Desea cambiar la contraseña del usuario?">
                                <div class="form-switch mt-3">
                                    <input class="form-check-input" type="checkbox" id="changePassword">
                                </div>
                            </div>
                        @endif
                        
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirma tu Contraseña: </label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mt-2" name="password_confirmation" value="{{old('password_confirmation')}}" id="password_confirmation" disabled @if ($type == 'create')
                                required
                            @endif >
                            @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="rol" class="col-sm-2 col-form-label">Roles: </label>
                        <div class="col-sm-9">
                            @foreach ($roles as $rol)
                            <div class="form-switch">
                                <input class="form-check-input" type="checkbox" name="roles[]" value="{{$rol->id}}" 
                                @if ($type == 'edit')
                                    @foreach ($user->roles as $rolUser)
                                        @if ($rolUser->id == $rol->id)
                                            checked
                                        @endif
                                    @endforeach
                                @endif>
                                <label class="form-check-label ms-3" for="roles">{{$rol->name}}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        
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
    <script src="{{asset('js/Users/formUser.js')}}"></script>
@stop

