@extends('vistaBootstrap')
@section('containerMain')
        <h1> Hola, soy la vista</h1><br>
        <h2>el nombre es
            <?php  echo $var2 ?>
        </h2><br>
        <h2> El nombre es {{$var2}}</h2>

        @if($var2 == 'Alvaro')
            <img src="{{asset('images/bg.png')}}" alt="la foto esta aquí" weight="100" height="100" >
            @else
            <h3>Sin foto</h3>
        @endif
        <br><br>
        <a href="{{route('salir')}}">Salir</a>
        @stop
