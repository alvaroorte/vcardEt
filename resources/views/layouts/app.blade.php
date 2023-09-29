<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('CSS/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/fontawesome-free-6.4.2/css/all.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{asset('assets/fontawesome-free-6.4.2/js/all.min.js')}}"></script>
    <script src="{{asset('js/jQuery/jquery-3.7.1.js')}}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-primary shadow-sm fixed-top" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">Nosotros</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAcordeon" aria-controls="navAcordeon" aria-expanded="false" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navAcordeon">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('listPeople')}}">Personas </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('listEmpresa')}}">Empresas </a>
                        </li>
                        @can('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('users.index')}}">Usuarios </a>
                            </li>
                        @endcan
                        
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <img src="{{asset('images/personPhoto/sin-foto.png')}}" alt="foto" height="30" width="30" class="me-2 img-circle">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @can('admin')
                                        <a class="dropdown-item" href="{{ route('users.create') }}">
                                            Crear usuario <i class="fa fa-user ms-2"></i>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('users.edit', Auth::user())}}">
                                            Editar mis datos <i class="fa fa-pencil ms-2"></i>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Cerrar Sesión <i class="fa fa-sign-out ms-2"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        

        <main class="p-4 sticky-sm-top" style="margin-top: 3.5rem;">
            
            <div class="card">
                <div class="card-header bg-primary text-white">
                    @yield('titlePage')
                </div>
                <div class="car-body p-4">
                    @yield('content')
                </div>
            </div>
            
        </main>
        <div class="footer text-center col-md-12 mt-2 fixed-bottom">
            <p>ENDE TECNOLOGIAS S. A. <i class="fa-regular fa-copyright"></i> <script>document.write(new Date().getFullYear())</script></p>
        </div>
    </div>

    
    <script src="{{asset('js/qrious/qrious4.0.2.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/sweetalert/sweetalert2.1.2.min.js')}}"></script>
    @yield('scripts')
</body>
</html>
