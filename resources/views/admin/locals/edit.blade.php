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
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">Editar local</div>
        <h6 class="card-subtitle">Todos los campos con * son obligatorios</h6>
        <form action="{{route('locals.update',$id->id)}}" method="post" id="form-main">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ubication">Ubicación *</label>
                        <input type="text" name="ubication" id="ubication" value="{{$id->ubication}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Código *</label>
                        <input type="text" name="code" id="code" value="{{$id->code}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dimensions">Dimeciones *</label>
                        <input type="text" name="dimensions" id="dimensions" value="{{$id->dimensions}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Valor *</label>
                        <input type="text" name="value" id="value" value="{{$id->value}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Tipo *</label>
                        <select name="type" id="type" class="form-control">
                            <option disabled selected></option>
                            <option {{$id->type == 'office' ? 'selected' : '' }} value="office">Oficina</option>
                            <option {{$id->type == 'local' ? 'selected' : '' }} value="local">Local</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="publish">
                            <input type="checkbox" name="publish" id="publish" value="1" {{$id->publish  ? 'checked' : ''}}>
                            Pagina de locales
                        </label>
                        <br>
                        <small>Cuando el local este disponible se ofertara en el listado de locales disponibles</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="description">Descripción *</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$id->description}}</textarea>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <label for="file">Galeria</label>
                <form action="{{route('files.upload',[$id->id,1])}}" class="dropzone" id="myAwesomeDropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary btn-send">Guardar</button>
    </div>
</div>
@endsection

@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/dropzone-master/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/dropzone-master/dist/dropzone.js')}}"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            dictDefaultMessage: 'Carga los archivos aquí o de clic',
            addRemoveLinks: true,
            maxFiles: 5,
            acceptedFiles: 'image/*',
            headers: {
                "Accept": "application/json",
                "Cache-Control": "no-cache",
                "X-Requested-With": "XMLHttpRequest",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        };
        $('.btn-send').click(function () {
            $('#form-main').submit();
        });
    </script>
@endsection