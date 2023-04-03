@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.nav')
    @include('pages.layouts.header')

    <div id="about">
        <section class="container">
            <div class="jumbotron">
                <h1 class="display-4 text-blue-dark text-center">CENTRO COMERCIAL JOSÉ LUÍS</h1>
                <p class="lead text-center text-blue-dark">Novedoso y único centro comercial en el municipio de Barbosa Antiquia.</p>
                <hr class="my-4">
                <p>Somos el único centro comercial de Barbosa desde el 2016 y día a día trabajamos para que nuestros visitantes tengan la mejor comodidad para realizar tramites y servicios en un mismo lugar.</p>
                <p>En el centro comercial José Luís nuestros comerciantes y visitantes son lo mas importante, tenemos espacios para que emprendas tu negocio en nuestros locales de alquiler, espacios publicitarios para hacer conocer tu marca, servicio de alquiler de auditorio y además un espacio en la terraza para tus eventos o reuniones sociales. No te pierdas la oportunidad de visitarnos.</p>
                <div class="text-center">
                    <a class="btn btn-primary btn-sm" href="{{route('about')}}" role="button">Leer más</a>
                </div>
              </div>
        </section>
    </div>
    @if ($estates)
        <div class="img-up" style="margin-bottom: -1px">
            <img id="img_logo_signup" src="{{asset('img/Ups.png')}}" alt="" >
        </div>
            <div id="estate" class="bg-purple text-white m-0 p-3">
                <section class="container">
                    <h1 class="display-4 text-center">TIENDAS</h1>
                    <p class="text-center">Date el lujo de visitar nuestras tiendas con toda la disposición de atenderte, y si fuera poco ofrecemos el espacio perfecto para que puedas estudiar o hacer las transaciones que desees. ¡Que esperas!</p>
                </section>
                <div class="slider mt-3 mb-3">
                    <div class="slide-track">
                        @foreach ($estates as $item)
                            <div class="slide">
                                <img src="{{asset("storage/avatar/locals/".$item->avatar)}}" width="250" alt="" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary btn-sm" href="{{route('estate')}}" role="button">Ver todo</a>
                </div>
            </div>
            <div class="img-up" style="background: white">
                <img id="img_logo_signup" src="{{asset('img/down.png')}}" alt="" >
            </div>
    @endif

    <div id="what_do" class="bg-white">
        <section class="container">
            <div class="jumbotron">
                <h1 class="display-4 text-center">¿QUE HACER EN BARBOSA?</h1>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img class="img-thumbnail rounded-circle img-radius m-3" src="{{asset('img/pages/barbosa1.jpg')}}" alt="Barbosa">
                    </div>
                    <div class="col-md-6">
                        <p class="lead">Barbosa sin duda es un hermoso pueblo a unos cuantos kilómetros de Medellín, es el último municipio del Área Metropolitana.</p>
                           <p class="lead">Llegar es tan fácil, solo tienes que tomar el alimentador del metro en la estación Niquía, el cuál te dejará en todo el centro de nuestro municipio.</p>
                        <hr class="my-4">
                        <p>Se te puede antojar ir de finca, camping, una caminata al cerro o ir a conocer la zona urbana de este hermoso municipio, una experiencia campestre que no olvidarás.</p>
                        <p>Al visitar Barbosa encontraras un municipio lleno de cultura, destacable gastronomía, hermosa naturaleza, lugares inolvidables y todo el sabor de un pueblo Antioqueño.</p>
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary btn-sm" href="{{route('barbosa')}}" role="button">Ver mas</a>
                </div>
            </div>
        </section>
    </div>
    <div id="yestoyes" class="p-3 bg-purple text-white">
        <section class="container-fluid p-3">
            <div class="container p-3">
                <div class="row">
                    <div class="col-md-6">
                        <p><i class="fas fa-angle-double-right"></i> Único centro comercial de Barbosa, lo cual nos convierte en punto de referencia comercial del municipio.</p>
                        <p><i class="fas fa-angle-double-right"></i> Un lugar ideal para realizar tus reuniones y encuentros sociales en lo mas alto.</p>
                        <p><i class="fas fa-angle-double-right"></i> Contamos con locales modernos a la medida de tus necesidades de forma ágil, cómoda y segura.</p>
                        <p><i class="fas fa-angle-double-right"></i> Encontrarás una gran variedad de espacios publicitarios ideales para hacerte conocer.</p>
                        <p><i class="fas fa-angle-double-right"></i> Plataformas digitales y sitios web para expandir tus límites.</p>
                        <p><i class="fas fa-angle-double-right"></i> Amplia cobertura de horarios para darte más libertad de escoger tu tiempo.</p>
                        <p><i class="fas fa-angle-double-right"><strong></i> ¡No busques más, somos el sitio perfecto para que puedas empreder tu negocio!</p></strong>
                    </div>
                    <div class="col-sm-6 p-3 p-3">
                        <img class="img-radius m-3" src="{{asset('img/pages/mall1.png')}}" alt="mall" width="100%">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="service" class="p-3">
        <section class="container p-3">
            <h1 class="display-4 text-center text-blue-dark">SERVICIOS</h1>
            <div class="row p-3">
                <div class="col-md-4 mb-3">
                    <div class="card bg-orange">
                        <img src="{{asset('img/pages/ascensores.jpeg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">ESPACIOS PUBLICITARIOS</h5>
                            <!-- <p class="card-text">Variedad de espacios publicitarios para tu marca al precio que puedes pagar.</p> -->
                            <a href="{{route('publicity_place')}}" class="btn btn-sm btn-primary">Conocer más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-ping">
                        <img src="{{asset('img/pages/local.jpeg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">LOCALES</h5>
                            <!-- <p class="card-text">Excelente espacios comerciales con locales comerciales y oficinas perfecto para tu emprendimiento.</p> -->
                            <a href="{{route('local')}}" class="btn btn-sm btn-primary">Ver todo</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-purple">
                        <img src="{{asset('img/pages/eventos.jpeg')}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">SALÓN DE EVENTOS</h5>
                            <!-- <p class="card-text">Terraza y salón de eventos para tus fiestas, eventos sociales y reuniones empresariales</p> -->
                            <a href="{{route('event_room')}}" class="btn btn-sm btn-primary">Cotizar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection
