@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.header-2', ['img' => 's_img_62.jpeg'])
    <div class="container">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('pages') }}">INICIO</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i>
                </span>
                <a class="nav-link" href="{{ route('local') }}">LOCALES</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i>
                </span>
                <a class="nav-link active disabled" href="#">{{ $id->code }}</a>
            </div>
        </nav>
    </div>
    <div id="about">
        <section class="container">
            <h1 class="display-4 text-blue-dark text-center">LOCAL {{ $id->code }}</h1>
            <hr>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                        $i = 1;
                    @endphp
                    @if ($id->files)
                        @foreach ($id->files as $item)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i++ }}"
                                class="{{ $item->id == 4 ? 'active' : '' }}"></li>
                        @endforeach
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if ($id->files)
                        @foreach ($id->files as $item)
                            <div class="carousel-item {{ $item->id == 4 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ $item->url . $item->name }}"
                                    alt="{{ $item->name }}" height="540px">
                            </div>
                        @endforeach
                    @endif
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <hr>
                <h1 class="display-4 text-blue-dark">Descripción</h1>
                <hr>
                <div class="justify-content-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p><strong>Ubicación: </strong>{{ $id->ubication }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="code">Código</label> --}}
                                <p><strong>Código: </strong> {{ $id->code }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="dimensions">Dimensiones</label> --}}
                                <p><strong>Dimensiones: </strong> {{ $id->dimensions }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="value">Valor</label> --}}
                                <p><strong>Valor: </strong> $ {{ number_format($id->value, 2) }} COP - Mes</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="type">Tipo</label> --}}
                                <p><strong>Tipo: </strong>{{ $id->type == 'office' ? 'Oficina' : 'Local' }}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{-- <label for="description"></label> --}}
                            <p><strong>Acerca del Local: </strong>{!! str_replace("\n", '</br>', addslashes($id->description)) !!}</p>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection
