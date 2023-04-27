@php
    function type_social($type)
    {
        if ($type == "Fecebook"){
            return "facebook-f"; //fab
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
        if ($type == "YouTube"){
            return "youtube"; //fab
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
                    <h4><strong>Descripción</strong></h4>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->description))!!}</p>
                    @if ($id->social_medias)
                        {{-- <p>Puedes encontrar a {{$id->brand}} en:</p> --}}
                        <h4>
                            @foreach ($id->social_medias as $item)
                                <a class="btn btn-circle btn-secondary" style="border-color: #dee2e6;border-radius: 100%;padding: 10px;width: 40px;
                                height: 40px;color: #212529;background-color: #f8f9fa;" target="_blank" href="{{$item->link}}"><i class="fab fa-{{type_social($item->type)}}"></i></a>
                            @endforeach
                        </h4>
                    @endif
                        <div class="row">
                            <div class="col-md-12">
                                <label for="file">Galeria</label>
                                <div class="card-columns el-element-overlay">
                                    @if ($id->files)
                                        @foreach ($id->files as $item)
                                            <div class="card">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1">
                                                        <a href="{{$item->url.$item->name}}">
                                                            <img src="{{$item->url.$item->name}}" alt="{{$item->name}}" width="100%" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    {{-- <p>Productos</p> --}}
                </div>
                <div class="col-md-3 text-center">
                    <img src="/storage/avatar/locals/{{$id->avatar}}" alt="{{$id->avatar}}" class="img-thumbnail rounded-circle">
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h4>¿Donde puedo encontrar a {{$id->brand}}?</h4>
                            <p>Ubicación: {{$id->local->ubication}}<br>Local: {{$id->local->code}}<br>Teléfono: {{$id->tel}}</p>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection

@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
@endsection

@section('js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/magnific-popup/dist/jquery.magnific-popup.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.el-card-avatar').magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endsection
