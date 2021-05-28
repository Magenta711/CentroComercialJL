@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.header-2',['img' => 's_img_42.jpg'])
    <div class="container">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-link" href="{{route('pages')}}">INICIO</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i>
                </span>
                <a class="nav-link active disabled" href="#">ESPACIOS PUBLICIDAD</a>
            </div>
        </nav>
    </div>
    <div id="about">
        <section class="container">
            <h1 class="display-4 text-blue-dark text-center">ESPACIOS PUBLICIDAD</h1>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-orange text-white">
                        <img src="{{asset('img/pages/ascensores2.jpeg')}}" alt="">
                        <div class="card-body">
                            <h4>Ascensor</h4>
                            <!-- <p> -->
                                <!-- Cada pisos <br>
                                Valor Mensual -->
                                <!-- <small>$000.000</small> -->
                            <!-- </p> -->
                            <!-- <button class="btn btn-sm btn-primary">
                                REVERVAR
                            </button> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-ping text-white">
                        <img src="{{asset('img/pages/escalas.jpeg')}}" alt="">
                        <div class="card-body">
                            <h4>Escalas</h4>
                            <!-- <p> -->
                                <!-- Cada pisos <br>
                                Valor Mensual -->
                                <!-- <small>$000.000</small> -->
                            <!-- </p> -->
                            <!-- <button class="btn btn-sm btn-primary">
                                REVERVAR
                            </button> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-purple text-white">
                        <img src="{{asset('img/pages/baños.jpeg')}}" alt="">
                        <div class="card-body">
                            <h4>Baños</h4>
                            <!-- <p> -->
                                <!-- Places <br>
                                Valor Mensual -->
                                <!-- <small>$000.000</small> -->
                            <!-- </p> -->
                            <!-- <button class="btn btn-sm btn-primary">
                                REVERVAR
                            </button> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-blue text-white">
                        <img src="{{asset('img/pages/rompetraficos.jpeg')}}" alt="">
                        <div class="card-body">
                            <h4>Rompetráficos</h4>
                            <!-- <p> -->
                                <!-- Places <br>
                                Valor Mensual -->
                                <!-- <small>$000.000</small> -->
                            <!-- </p> -->
                            <!-- <button class="btn btn-sm btn-primary">
                                REVERVAR
                            </button> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-orange text-white">
                        <img src="{{asset('img/pages/ditel.jpeg')}}" alt="">
                        <div class="card-body">
                            <h4>Ditel de entrada</h4>
                            <!-- <p> -->
                                <!-- Places <br>
                                Valor Mensual -->
                                <!-- <small>$000.000</small> -->
                            <!-- </p> -->
                            <!-- <button class="btn btn-sm btn-primary">
                                REVERVAR
                            </button> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-ping text-white">
                        <img src="{{asset('img/pages/ascensores2.jpg')}}" alt="">
                        <div class="card-body">
                            <h4>Paredes</h4>
                            <p>
                                Places <br>
                                Valor Mensual
                                <small>$000.000</small>
                            </p>
                            <button class="btn btn-sm btn-primary">
                                REVERVAR
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-purple text-white">
                        <img src="{{asset('img/pages/ascensores2.jpg')}}" alt="">
                        <div class="card-body">
                            <h4>Vitrina</h4>
                            <p>
                                Places <br>
                                Valor Mensual
                                <small>$000.000</small>
                            </p>
                            <button class="btn btn-sm btn-primary">
                                REVERVAR
                            </button>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection