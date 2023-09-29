@extends('layouts.app')

@section('titlePage')
<h2>¿Quienes Somos?</h2>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                  </div>
                                <div class="carousel-inner">
                                  <div class="carousel-item active" data-bs-interval="3000">
                                    <img src="{{asset('assets/home/img/ende3.jpg')}}" class="d-block w-100" alt="image1" style="height: 70vh">
                                  </div>
                                  <div class="carousel-item" data-bs-interval="3000">
                                    <img src="{{asset('assets/home/img/ende2.jpg')}}" class="d-block w-100" alt="image2" style="height: 70vh">
                                  </div>
                                  <div class="carousel-item" data-bs-interval="3000">
                                    <img src="{{asset('assets/home/img/ende1.jpg')}}" class="d-block w-100" alt="image3" style="height: 70vh">
                                  </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script src="{{asset('js/layouts/home.js')}}"></script>
@endsection
