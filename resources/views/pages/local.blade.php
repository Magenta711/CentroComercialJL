@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.header-2',['img' => 's_img_62.jpeg'])
    <div class="container">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-link" href="{{route('pages')}}">INICIO</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i>
                </span>
                <a class="nav-link active disabled" href="#">LOCALES</a>
            </div>
        </nav>
    </div>
    <div id="about">
        <section class="container">
            <h1 class="display-4 text-blue-dark text-center">LOCALES</h1>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-orange text-white">
                        <img src="{{asset('img/pages/206.jpeg')}}" alt="">
                        <div class="card-body">
                            <h4>Local 206</h4>
                            <p>
                                Piso 2
                                 <br>
                                <small>10m * 15m</small>
                                 <br>
                                <small>$000.000</small>
                            </p>
                            <button class="btn btn-sm btn-primary">
                                Ver local
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                    <div class="card text-center bg-ping text-white">
                        <img src="{{asset('img/pages/local2.jpg')}}" alt="">
                        <div class="card-body">
                            <h4>Local 101</h4>
                            <p>
                                Piso 1
                                 <br>
                                <small>10m * 15m</small>
                                 <br>
                                <small>$000.000</small>
                            </p>
                            <button class="btn btn-sm btn-primary">
                                Ver local
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection