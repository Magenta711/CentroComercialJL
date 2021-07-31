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
                <li class="breadcrumb-item active">Arrendar</li>
            </ol>
        </div>
    </div>
</div>
<form action="{{route('publicity_place.save',$id->id)}}" method="post">
    @csrf
    @method('PATCH')
    <div class="card">
        <div class="card-body">
            <div class="card-title">Arendar espacio publicitario</div>
            <h6 class="card-subtitle">Todos los campos con * son obligatorios</h6>
            <div class="form-group">
                <label for="user_id">Usuario *</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option selected disabled>Selecciona el usuario</option>
                    @foreach ($users as $item)
                        <option {{old('user_id') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descripción *</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@endsection