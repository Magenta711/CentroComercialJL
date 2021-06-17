@extends('pages.layouts.pages')
@section('content')
    @include('pages.layouts.header-2',['img' => 's_img_12.jpg'])
    <div class="container">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="navbar-nav">
                <a class="nav-link" href="{{route('pages')}}">INICIO</a>
                <span class="navbar-text">
                    <i class="fas fa-angle-double-right"></i> 
                </span>
                <a class="nav-link active disabled" href="#">NOSOTROS</a>
            </div>
        </nav>
    </div>
    <div id="about">
        <section class="container">
            <div class="jumbotron">
                {!! $id->about !!}
              </div>
        </section>
    </div>
    @include('pages.layouts.contact-form') 
@endsection