@php
    function type_social($type)
    {
        if ($type == "Fecebook"){
            return "facebook"; //fab
        }
        if ($type == "Instagram"){
            return "instagram"; //fab
        }
        if ($type == "Whatsapp"){
            return "whatsapp"; //fab
        }
        if ($type == "Twiter"){
            return "twitter"; //fab
        }
        if ($type == "LinkedIn"){
            return "linkedin-in"; //fab
        }
        if ($type == "Página Web"){
            return "search"; // fas
        }
        if ($type == "Otra"){
            return "link"; // fab
        }
        return "link"; // fab
    }
@endphp

@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.header-2',['img' => 's_img_32.jpg'])
    <div class="container">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-link" href="{{route('pages')}}">INICIO</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i> 
                </span>
                <a class="nav-link" href="{{route('estate')}}">TIENDAS</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i> 
                </span>
                <a class="nav-link active disabled" href="#">{{$id->brand}}</a>
            </div>
        </nav>
    </div>
    <div id="about">
        <section class="container">
            <h1 class="display-4 text-blue-dark text-center">{{$id->brand}}</h1>
            <div class="row">
                <div class="col-md-9">
                    <p>{!! str_replace("\n", '</br>', addslashes($id->description))!!}</p>
                    @if ($id->social_medias)
                        <p>Puedes encontrar a {{$id->brand}} en:</p>
                        <h4>
                            @foreach ($id->social_medias as $item)
                                <a class="mx-2" target="_blank" href="{{$item->link}}"><i class="fab fa-{{type_social($item->type)}}"></i></a>
                            @endforeach
                        </h4>
                    @endif
                    <p>Galeria</p>
                    
                    <p>Productos</p>
                </div>
                <div class="col-md-3 text-center">
                    <img src="/storage/avatar/locals/{{$id->avatar}}" alt="{{$id->avatar}}" class="img-thumbnail rounded-circle">
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h4>¿Donde puedo encontrar a {{$id->brand}}?</h4>
                            <p>Ubicación: {{$id->local->ubication}}<br>Local: {{$id->local->code}}</p>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection