@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de página</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item">Administración de página</li>
                <li class="breadcrumb-item active">Nosotros</li>
            </ol>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Nosotros</h4>
        <h6 class="card-subtitle">Puede seleccionar contenido y editar en línea, no olvides guardar</h6>
        <div class="inline-editor">
            {!! $id->about !!}
        </div>
    </div>
    <div class="card-footer" style="display: none;">
        <form action="{{route('admin_about.store')}}" method="POST" id="form">
            @csrf
            <textarea name="text" id="textarea" class="hide"></textarea>
            <button id="save" class="btn btn-success btn-rounded" type="button">Guardar</button>
        </form>
    </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('eliteadmin/assets/node_modules/summernote/dist/summernote-bs4.css')}}">
@endsection

@section('js')
<script src="{{asset('eliteadmin/assets/node_modules/summernote/dist/summernote-bs4.min.js')}}"></script>
<script>
    $(function() {
        $('.inline-editor').summernote({
            airMode: true
        });
        $('.note-editor').click(function () {
            $('#save').parent().parent().show();
        });
        $('#save').click( function () {
            $('#textarea').val($('.note-editable').html());
            $('#form').submit();
        });
    });
    </script>
@endsection