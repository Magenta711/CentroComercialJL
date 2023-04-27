<style>
    #brand{
        font-size: 20px;
        color: #ffffff;
        font-weight: 700;
    }
    #description{
        font-size: 0px;
        visibility: none;
    }
    .card-body{
        width: 100%;
        height: 120px;
        margin: 0 auto;
    }
    #boxs:hover #description {
            transform-origin: bottom;
            transform: translateY(0);
            font-size: 13;
    }
    .img{
        transition: .4s;
        position: relative;
    }
    #boxs {
        transition: .4s;
    }
    .medium-box {
        transition: .4s;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #boxs:hover .img{
        transform-origin: top;
        transform: scaleY(0);
    }
    #boxs:hover .medium-box{
        transform: translateY(-100%)
    }
</style>

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
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 p-3" id="boxs">
                        <div class="card shadow-sm h-100 text-center {{colorBg($i)}} text-white" id="card">
                            <img class="img" src="/storage/avatar/locals/{{$item->avatar}}" alt="{{isset($item->files[0]) ? $item->files[0]->name : '' }}">
                            <div class="medium-box">
                                <div class="card-body">

                                    <a id="brand" href="{{route('estate.show',$item->id)}}">{{$item->brand}}</a>
                                    <p id="description">
                                        {{$item->description}}
                                        <br>
                                        <br>
                                        <small>{{$item->tel}}</small>
                                        <br>
                                        {{$item->local->ubication}}<br>Local: {{$item->local->code}}
                                    </p>
                                    {{-- <a href="{{route('estate.show',$item->id)}}" class="btn btn-sm btn-primary btn-force-center-buttom">
                                        Ver {{$item->type == 'office' ? 'oficina' : 'local' }}
                                    </a> --}}
                                    {{-- <button type="button" id="tiendas-{{$item->id}}" class="btn btn-sm btn-primary show-modal" alt="default" data-toggle="modal" data-target="#tiendas-{{$item->id}}"><i class="fa fa-eye"></i></button> --}}
                                </div>
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
                    @include('admin.forms.modals.pendientes')
                @endforelse
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection
