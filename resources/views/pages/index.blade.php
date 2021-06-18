@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.nav')
    @include('pages.layouts.header')
    
    <div id="about">
        <section class="container">
            <div class="jumbotron">
                <h1 class="display-4 text-blue-dark text-center">CENTRO COMERCIAL JOSE LUÍS</h1>
                <p class="lead text-center text-blue-dark">Novedoso y único centro comercial en el municipio de Barbosa Antiquia.</p>
                <hr class="my-4">
                <p>Somos el centro comercial de Barbosa desde el 2016 y día a día trabajamos para que nuestros visitantes tengan toda la comodida de realizar tramites y servicios en un mismo lugar.</p>
                <p>En el centro comercial Jose Luis nuestros comerciantes y visitantes son lo mas importante, tenemos espacios para que emprendas tu negocio en nuestras locales de alquiles, espacios publicitarios para hacer conocer tu marca, servicio de alquiler de auditorio y además espacio en la terraza para sus eventos o reuniones sociales por lo mas alto. No te pierdas la oportunidad de visitarnos.</p>
                <div class="text-center">
                    <a class="btn btn-primary btn-sm" href="{{route('about')}}" role="button">Leer más</a>
                </div>
              </div>
        </section>
    </div>
    <div id="estate" class="bg-purple text-white p-3">
        <section class="container">
            <h1 class="display-4 text-center">TIENDAS</h1>
            <p class="text-center">Date el lujo de visitar nuestras tiendas con toda la disposición de atendete, y si fuera poco encuentra en el mismo lugar, donde estudiar o hacer las transaciones que desees ¡Que esperas!</p>
        </section>
                <div class="slider mt-3 mb-3">
                    <div class="slide-track">
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_1.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_2.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_1.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_2.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_1.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_2.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_1.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_2.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_1.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_2.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_1.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_2.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_1.png')}}" width="250" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{asset('img/pages/l_img_2.png')}}" width="250" alt="" />
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary btn-sm" href="{{route('estate')}}" role="button">Ver todo</a>
                </div>
    </div>
    <div id="what_do" class="bg-white">
        <section class="container">
            <div class="jumbotron">
                <h1 class="display-4 text-center">¿QUE HACER EN BARBOSA?</h1>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img class="img-thumbnail rounded-circle img-radius m-3" src="{{asset('img/pages/barbosa1.jpg')}}" alt="Barbosa">
                    </div>
                    <div class="col-md-6">
                        <p class="lead">Barbosa sin duda es un hermoso pueblo a unos cuantos kilometros de Medellín, el ultimo municipio del Area Metropolitana, llegar es tan facil como tomar alimentador del metro.</p>
                        <hr class="my-4">
                        <p>Vistita Barbosa y encontraras un municipio lleno de cultura, destacable gastronomia, naturaleza, lugares inolvidables y todo el sabor de un pueblo Antioqueño.</p>
                        <p>Se te puede antojar ir de finca, de camping, caminata al cerro e ir a conocer la zona hurbana de este hermoso municipio municipio.</p>
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
                        <p><i class="fas fa-angle-double-right"></i> Unico centro comercial de Barbosa, nos combierte en punto de referencia comercial del municipio</p>
                        <p><i class="fas fa-angle-double-right"></i> Un lugar ideal para ir a realizar tus reuniones y encontros sociales en lo mas alto.</p>
                        <p><i class="fas fa-angle-double-right"></i> El local modernos a la medida de tus necesidades de forma ajil, comoda y segura.</p>
                        <p><i class="fas fa-angle-double-right"></i> Sin buscar mas, el sitio perfecto para empreder tu negocio</p>
                        <p><i class="fas fa-angle-double-right"></i> Encuentras variedad de espacios publicitarios ideales para hacerte conocer</p>
                        <p><i class="fas fa-angle-double-right"></i> Plataformas digitales y sitios web para espadir tus limites</p>
                        <p><i class="fas fa-angle-double-right"></i> Ampia covertura de horarios para darte mas libertad de escoger tu tiempo</p>
                    </div>
                    <div class="col-sm-6 p-3 p-3">
                        <img class="img-radius m-3" src="{{asset('img/pages/mall1.png')}}" alt="mall">
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