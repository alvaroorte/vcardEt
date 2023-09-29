{{-- @extends('layouts.app')

@section('card')
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="card profile-card-3 sombra-black">
                        <div class="background-block">
                            <img src="{{asset('images/fondoPerson/'.$person->fondo)}}" alt="profile-sample1" class="background">
                        </div>
                        <div class="profile-thumb-block">
                            <img src="{{asset('images/personPhoto/'.$person->foto)}}" alt="profile-image" class="profile-lg profile-md profile-sm ">
                        </div>
                        <div class="card-content">
                            <h2>{{$person->primer_nombre}} 
                                @if ($person->segundo_nombre)
                                    {{$person->segundo_nombre}}
                                @endif 
                                {{$person->primer_apellido}}
                                @if ($person->segundo_apellido)
                                    {{$person->segundo_apellido}}
                                @endif 
                                <small>{{$person->cargo}}</small>
                            </h2>
                            <h3>{{$person->nombre}}</h3>
                            <div class="icon-block">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                                        <a href="#"> <i class="fa-regular fa-envelope"></i></a><br>
                                        {{$person->correo}}
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                        <a href="#"><i class="fa fa-mobile "></i></a><br>   
                                        {{$person->celular}}
                                    </div>
                                   
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                        <a href="#"> <i class="fa fa-phone"></i></a><br>
                                        @if ($person->telefono)
                                            {{$person->telefono}}
                                        @else
                                            ---
                                        @endif
                                    </div>
                                    <div>
                                        <img alt="Código QR" id="codigo">
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@stop

@section('scripts')
    <script src="{{asset('js/Personas/infoPerson.js')}}"></script>
@stop --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('CSS/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fontawesome-free-6.4.2/css/all.min.css')}}">
    <script src="{{asset('js/jQuery/jquery-3.7.1.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{asset('assets/fontawesome-free-6.4.2/js/all.min.js')}}"></script>
</head>
<body>
    <div id="card" class="px-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-4">
                <div class="card profile-card-3 sombra-black">
                    <div class="background-block">
                        <img id="fondo" src="{{asset('images/fondoPerson/'.$person->fondo)}}" alt="profile-sample1" class="background">
                    </div>
                    <div class="profile-thumb-block">
                        <img id="foto" src="{{asset('images/personPhoto/'.$person->foto)}}" alt="profile-image" class="profile-lg profile-md profile-sm downloadVcard">
                    </div>
                    <div class="card-content">
                        <h2 id="nombre" class="downloadVcard">{{$person->primer_nombre}} @if ($person->segundo_nombre)
                                {{$person->segundo_nombre}}
                            @endif 
                            {{$person->primer_apellido}}
                            @if ($person->segundo_apellido)
                                {{$person->segundo_apellido}}
                            @endif 
                        </h2>
                        <h2>
                            <small id="cargo">{{$person->cargo}}</small>
                        </h2>
                        <h3 id="nombreEmpresa">{{$person->nombre}}</h3>
                        {{-- <span id="paginaWeb" data-bs-toggle="tooltip" data-bs-original-title="Página Web">
                            <a href="//{{$person->pagina_web}}"><i class="fa fa-at me-2"></i></a>{{$person->pagina_web}}
                        </span> --}}
                        {{-- <div class="icon-block"> --}}
                            <div class="row">
                                <div id="paginaWeb" class="col-lg-12 col-md-6 col-sm-12 mb-3" data-bs-toggle="tooltip" data-bs-original-title="Página Web">
                                    <a href="//{{$person->pagina_web}}" class="d-md-block d-lg-inline" target="_blank"><i class="fa fa-at me-2"></i></a>
                                    {{$person->pagina_web}}
                                </div>
                                
                                <div id="correo" class="col-lg-4 col-md-6 col-sm-12 mb-3" data-bs-toggle="tooltip" data-bs-original-title="Correo electrónico laboral">
                                    <a class="d-md-block" href="mailto:{{$person->correo}}.com?subject=Asunto del Correo&body=Cuerpo del Correo" target="_blank"> <i class="fa-regular fa-envelope me-2"></i></a>
                                    {{$person->correo}}
                                </div>
                                <div id="celular" class="col-lg-4 col-md-6 col-sm-12 mb-3" data-bs-toggle="tooltip" data-bs-original-title="Número de celular">
                                    <a class="d-md-block" href="https://api.whatsapp.com/send?phone={{$person->celular}}" target="_blank"><i class="fa fa-mobile-screen  me-2"></i></a>   
                                    {{$person->celular}}
                                </div>
                               
                                <div id="telefono" class="col-lg-4 col-md-6 col-sm-12 mb-3" data-bs-toggle="tooltip" data-bs-original-title="Número de teléfono">
                                    <a class="d-md-block" href="#"> <i class="fa fa-phone me-2"></i></a>
                                    @if ($person->telefono)
                                        {{$person->telefono}}
                                    @else
                                        ---
                                    @endif
                                </div>
                                
                                <div id="interno" class="col-lg-6 col-md-6 col-sm-12 mb-3" data-bs-toggle="tooltip" data-bs-original-title="Número de teléfono interno">
                                    <a class="d-md-block" href="#"><i class="fa fa-phone me-1 me-2"></i><i class="fa fa-building me-2"></i></a>
                                    @if ($person->interno)
                                        {{$person->interno}}
                                    @else
                                        ---
                                    @endif
                                </div>
                                
                                <div id="fax" class="col-lg-6 col-md-6 col-sm-12 mb-3" data-bs-toggle="tooltip" data-bs-original-title="Número de Fax">
                                    <a class="d-md-block" href="#"> <i class="fa fa-fax me-2"></i></a>
                                    @if ($person->fax)
                                        {{$person->fax}}
                                    @else
                                        ---
                                    @endif
                                </div>
                                <div>
                                    <img alt="Código QR" id="codigo">
                                </div>
                                {{-- <div>
                                    <a id="vcard" href="#"><i class="fa fa-user"></i></a>
                                </div> --}}
                                <div id="vcardcanvas" style="display: none" ></div>
                                <a id="vcardDonwload" style="display: none" ></a>
                            </div>
                            
                            
                            
                            
                            
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="footer text-center col-md-12 mt-3">
            <p>ENDE TECNOLOGIAS S. A. <i class="fa-regular fa-copyright"></i> <script>document.write(new Date().getFullYear())</script></p>
        </div>
    </div>

    
    <script src="{{asset('js/qrious/qrious4.0.2.js')}}"></script>
    <script src="{{asset('js/Personas/vcard.js')}}"></script>
    <script src="{{asset('js/Personas/infoPerson.js')}}"></script>
</body>
</html>