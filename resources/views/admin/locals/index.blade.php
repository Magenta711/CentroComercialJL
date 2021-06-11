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
                <li class="breadcrumb-item active">Administración de Locales</li>
            </ol>
            <a href="{{route('locals.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Crear
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h4 class="card-title">Locales</h4>
        <h6 class="card-subtitle">Lista de locales</h6>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <img class="card-img-top img-responsive" src="{{asset('eliteadmin/assets/images/big/img1.jpg')}}" alt="Card image cap">
            <div class="card-img-overlay">
                <h5 class="card-title bg-secondary rounded text-center">Arrendado</h5>
            </div>
            <div class="card-body">
                <h4 class="card-title text-center">Local 101</h4>
                <div class="text-center">
                    <a href="#" class="btn waves-effect waves-light btn-outline-primary"><i class="fa fa-eye"></i></a>
                    <a href="#" class="btn waves-effect waves-light btn-outline-success"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn waves-effect waves-light btn-outline-warning"><i class="fa fa-key"></i></a>
                    <a href="#" class="btn waves-effect waves-light btn-outline-danger"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection