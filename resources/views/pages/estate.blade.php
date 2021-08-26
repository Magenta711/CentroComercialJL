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
                @foreach ($estates as $item)
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 p-3">
                        <a href="{{route('estate.show',$item->id)}}">
                            <img class="m-3" src="{{asset("storage/avatar/locals/".$item->avatar)}}" alt="" width="100%">
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    @include('pages.layouts.contact-form')
@endsection