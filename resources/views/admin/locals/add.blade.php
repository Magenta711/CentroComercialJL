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
                <li class="breadcrumb-item active">Arrendar</li>
            </ol>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">Arrendar local</div>
        <h6 class="card-subtitle">Todos los campos con * son obligatorios</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Arrendador</label>
                    <select name="" id="" class="form-control">
                        <option selected disabled>Selecciona el arrendador</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/dropzone-master/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/dropzone-master/dist/dropzone.js')}}"></script>
@endsection