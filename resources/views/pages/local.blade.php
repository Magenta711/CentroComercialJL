@php
    function colorBg($i)
    {
        if (2 % $i == 0) {
            return true;
        }
        return false;
    }
@endphp
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
                @php
                    $i = 2;
                @endphp
                @forelse ($locals as $item)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                        <div class="card text-center {{colorBg($i) ? 'bg-orange' : 'bg-purple'}} text-white">
                            <img src="{{$item->files[0]->url.$item->files[0]->name}}" alt="{{$item->files[0]->name}}">
                            <div class="card-body">
                                <h4>{{$item->type == 'office' ? 'Oficina' : 'Local' }} {{$item->code}}</h4>
                                <p>
                                    {{$item->ubication}}
                                    <br>
                                    <small>{{$item->dimensions}}</small>
                                    <br>
                                    <small>{{$item->value}}</small>
                                </p>
                                <button class="btn btn-sm btn-primary">
                                    Ver {{$item->type == 'office' ? 'oficina' : 'local' }}
                                </button>
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @empty
                    <p class="text-muted text-center">Sin resultados</p>
                @endforelse
                {{-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
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
                </div> --}}
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection