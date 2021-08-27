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

@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de locales</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item">Administración de Locales</li>
                <li class="breadcrumb-item active">Ver</li>
            </ol>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">Tienda</div>
        <div class="card-subtitle">Información disponibles en la página de la tienda</div>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="ubications">Marca</label>
                    <p>{{$id->brand}}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Página</label>
                    <p>{{$id->page}}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Publica</label>
                    <p>{{$id->is_page ? 'Si' : 'No'}}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Descripción</label>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->description)) !!}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Redes sociales</label><br>
                    @foreach ($id->social_medias as $item)
                        <a target="_blank" href="{{$item->link}}"><i class="fab fa-{{type_social($item->type)}}"></i></a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="card-title">Logo</h4>
                <img src="/storage/avatar/locals/{{$id->avatar}}" alt="{{$id->avatar}}" class="img-thumbnail rounded-circle">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="file">Galeria</label>
                <div class="card-columns el-element-overlay">
                    @if ($id->files)
                        @foreach ($id->files as $item)
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1">
                                        <a class="image-popup-vertical-fit" href="{{$item->url.$item->name}}"> <img src="{{$item->url.$item->name}}" alt="{{$item->name}}" /> </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="file">Productos</label>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">Información del local</div>
        <h6 class="card-subtitle">Información de administración del local</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ubication">Ubicación</label>
                    <p>{{$id->local->ubication}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Código</label>
                    <p>{{$id->local->code}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dimensions">Dimeciones</label>
                    <p>{{$id->local->dimensions}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="value">Valor</label>
                    <p>{{$id->local->value}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Tipo</label>
                    <p>{{$id->local->type == 'office' ? 'Officina' : 'Local' }}</p>
                </div>
            </div>
            <div class="col-md-12">
                <label for="description">Descripción</label>
                <p>{!! str_replace("\n", '</br>', addslashes($id->local->description)) !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="file">Galeria</label>
                <div class="card-columns el-element-overlay">
                    @if ($id->local->files)
                        @foreach ($id->local->files as $item)
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1">
                                        <a class="image-popup-vertical-fit" href="{{$item->url.$item->name}}"> <img src="{{$item->url.$item->name}}" alt="{{$item->name}}" /> </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('eliteadmin/inverse/dist/css/pages/user-card.css')}}" rel="stylesheet">
@endsection

@section('js')
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