@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de espacios publicitarios</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item">Administración de espacios publicitarios</li>
                <li class="breadcrumb-item active">Ver</li>
            </ol>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">Ver espacio publicitario</div>
        <h6 class="card-subtitle">Información disponible del espacio publicitarios junto con los clientes</h6>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ubications">Ubicaciones *</label>
                            <p>{{$id->ubications}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Título *</label>
                            <p>{{$id->title}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="value">Valor *</label>
                            <p>{{$id->value}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="publish">Página de espacios publicitarios</label>
                            {{ $id->publish ? 'checked' : '' }}>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="description">Descripción *</label>
                        <p>{{$id->description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="card-title">Logo</h4>
                <img src="/storage/avatar/publicity_place/{{$id->avatar}}" alt="{{$id->avatar}}" class="img-thumbnail rounded-circle">
            </div>
            <div class="col-md-12">
                <label for="file">Galeria</label>
                <div class="card-columns el-element-overlay">
                    @foreach ($id->files as $item)
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1">
                                    <a class="image-popup-vertical-fit" href="{{$item->url.$item->name}}"> <img src="{{$item->url.$item->name}}" alt="{{$item->name}}" /> </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">Arrendatarios</div>
        <h6 class="card-subtitle">Historial de rentas</h6>
        @foreach ($id->details as $item)
            <div class="row">
                <div class="col-md-6">
                    <label for="">Usuario</label>
                    <p>{{$item->user->name}}</p>
                </div>
                <div class="col-md-6">
                    <label for="">Fecha</label>
                    <p>{{$item->created_at}}</p>
                </div>
                <div class="col-md-12">
                    <label for="">Descripción</label>
                    <p>{{$item->description}}</p>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</div>
@endsection

@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('eliteadmin/inverse/dist/css/pages/user-card.css')}}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.js')}}"></script>
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