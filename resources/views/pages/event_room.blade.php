@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.header-2',['img' => 's_img_52.jpg'])
    <div class="container">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-link" href="{{route('pages')}}">INICIO</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i>
                </span>
                <a class="nav-link active disabled" href="#">SALON DE EVENTOS</a>
            </div>
        </nav>
    </div>
    <div id="about">
        <section class="container">
            <h1 class="display-4 text-blue-dark text-center">SALON DE EVENTOS</h1>
            <div class="row justify-content-center">
                <div class="col-sm-6 text-center pb-3">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('img/pages/eventos1.jpeg')}}" alt="First slide">
                            <!-- <div class="carousel-caption">
                                <h3>Start</h3>
                                <p>¡Único centro comercial en Barbosa!</p>
                            </div> -->
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/pages/eventos2.jpeg')}}" alt="Second slide">
                            <!-- <div class="carousel-caption">
                                <h3>Grow</h3>
                                <p>LA is always so much fun!</p>
                            </div> -->
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/pages/eventos3.jpeg')}}" alt="Third slide">
                            <!-- <div class="carousel-caption">
                                <h3>Undertake</h3>
                                <p>LA is always so much fun!</p>
                            </div> -->
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/pages/eventos4.jpeg')}}" alt="Four slide">
                            <!-- <div class="carousel-caption">
                                <h3>Undertake</h3>
                                <p>LA is always so much fun!</p>
                            </div> -->
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/pages/eventos5.jpeg')}}" alt="Five slide">
                            <!-- <div class="carousel-caption">
                                <h3>Undertake</h3>
                                <p>LA is always so much fun!</p>
                            </div> -->
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/pages/evento6.jpeg')}}" alt="Six slide">
                            <!-- <div class="carousel-caption">
                                <h3>Undertake</h3>
                                <p>LA is always so much fun!</p>
                            </div> -->
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('img/pages/eventos7.jpeg')}}" alt="Seven slide">
                            <!-- <div class="carousel-caption">
                                <h3>Undertake</h3>
                                <p>LA is always so much fun!</p>
                            </div> -->
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, alias dolorum inventore vitae perferendis illo voluptates distinctio illum
                    </p>
                    <p>
                        <b>Ubicacion</b> <br>
                        <b>Medidas</b> <br>
                        <b>Valor</b> <br>
                        <b>Medidas</b> <br>
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ratione odio temporibus, magni laborum repellat beatae est eos culpa, aliquam ipsam quia pariatur, ullam quae nisi at! Inventore, odit repudiandae?
                    </p>
                    <button type="button" id="reserva" class="btn btn-sm btn-success reserva-modal" alt="default" data-toggle="modal" data-target="#reserva-modal">Reserva</button>
                </div>



                <div id="reserva-modal" class="modal fade" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="text-center">
                                    <span><img class="me-4" src="img/logo-min.png"
                                            alt="" height="100px">
                                    <h4>Reservas</h4>
                            </div>

                            <form class="ps-3 pe-3" action="{{route('event_room_store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Nombre</label>
                                    <input class="form-control" type="text" name="namereserva" id="username"
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label for="emailaddress">Correo Electrónico</label>
                                    <input class="form-control" type="email" name="emailreserva" id="emailaddress"
                                        required=""">
                                </div>

                                <div class="form-group">
                                    <label for="password">Teléfono</label>
                                    <input class="form-control" type="number" name="telefonoreserva" required=""
                                        id="telefono">
                                </div>

                                <div class="form-group">
                                    <label for="password">Fecha de Reserva</label>
                                    <input class="form-control" type="date" name="fechareserva" required=""
                                        id="fecha">
                                </div>

                                <div class="form-group">
                                    <label for="password">Descripción del evento:</label>
                                    <textarea name="descripcionreserva" class="form-control" id="descripcion" cols="5" rows="1"></textarea>
                                </div>

                                <div class="form-group">
                                        <a><small>Después de hacer la reserva, nos comunicaremos contigo para poder realizar la cotización.</a></small>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">Reservar</button>
                                </div>

                            </form>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection
