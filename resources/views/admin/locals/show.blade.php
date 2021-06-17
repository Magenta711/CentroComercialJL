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
        <div class="card-title">Ver local</div>
        <h6 class="card-subtitle">Información disponibles junto con los rendatarios del local aquí mismo</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ubication">Ubicación</label>
                    <p>{{$id->ubication}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Código</label>
                    <p>{{$id->code}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dimensions">Dimeciones</label>
                    <p>{{$id->dimensions}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="value">Valor</label>
                    <p>{{$id->value}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Tipo</label>
                    <p>{{$id->type == 'office' ? 'Officina' : 'Local' }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="publish">Pagina de locales</label>
                    <p>{{$id->publish  ? 'Si' : 'No'}}</p>
                </div>
            </div>
            <div class="col-md-12">
                <label for="description">Descripción</label>
                <p>{{$id->description}}</p>
            </div>
        </div>
        <div class="row">
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
        @foreach ($id->rents as $item)
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user_id">Arrendador</label>
                        <p>{{$item->user->name}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="brand">Marcar</label>
                        <p>{{$item->brand}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dimensions">Descripción</label>
                        <p>{{$item->description}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="#" class="btn btn-link">Ver mas</a>
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