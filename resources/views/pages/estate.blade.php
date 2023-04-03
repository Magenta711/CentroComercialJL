@php
    function colorBg($i)
    {

        switch ($i) {
            case 1:
                return "bg-orange";
                break;
            case 2:
                return "bg-purple";
                break;
            case 3:
                return "bg-ping";
                break;
            default:
                return "bg-purple";
                break;
        }
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
                <a class="nav-link active disabled" href="#">TIENDAS</a>
            </div>
        </nav>
    </div>
    <div id="about">
        <section class="container">
            <h1 class="display-4 text-blue-dark text-center">TIENDAS</h1>
            <div class="row justify-content-center">
                @php
                    $i = 1;
                @endphp
                @forelse ($estates as $item)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3">
                        <div class="card shadow-sm h-100 text-center {{colorBg($i)}} text-white">
                            <img src="{{ (isset($item->files[0])) ? $item->files[0]->url.$item->files[0]->name : '/img/logo.jpg'}}" alt="{{isset($item->files[0]) ? $item->files[0]->name : '' }}" height="175px" width="100%">
                            <div class="card-body">
                                <h4>{{$item->brand}}</h4>
                                <p>
                                    {{$item->description}}
                                    <br>
                                    <small>{{$item->tel}}</small>
                                    <br>
                                </p>
                                <a href="{{route('estate.show',$item->id)}}" class="btn btn-sm btn-primary btn-force-center-buttom">
                                    Ver {{$item->type == 'office' ? 'oficina' : 'local' }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @php
                        $i++;
                        if($i > 3){
                            $i = 1;
                        }
                    @endphp
                @empty
                    <p class="text-muted text-center">Sin resultados</p>
                @endforelse
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection
