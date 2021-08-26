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
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>
</div>
<form action="{{route('publicity_place.update',$id->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="row">
    <div class="col-md-12">
        <div class="card-title">Editar espacio publicitario</div>
        <h6 class="card-subtitle">Todos los campos con * son obligatorios</h6>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Avatar</h4>
                <label for="input-file-now">En sugerencia subir una imagen con las dimenciones de 2:2 y fondo blanco</label>
                <input type="file" name="file" id="input-file-now" class="dropify" accept="image/*" data-default-file="/storage/avatar/publicity_place/{{$id->avatar}}" />
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ubications">Ubicaciones *</label>
                            <input type="text" name="ubications" id="ubications" value="{{$id->ubications}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Título *</label>
                            <input type="text" name="title" id="title" value="{{$id->title}}" class="form-control">
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
                            <label for="publish">
                                <input type="checkbox" name="publish" id="publish" value="1" {{ $id->publish ? 'checked' : '' }}>
                                Pagina de espacios publicitarios
                            </label>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="description">Descripción *</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$id->description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <label for="file">Galeria</label>
                <form action="{{route('files.upload',[$id->id,3])}}" class="dropzone" id="myAwesomeDropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('eliteadmin/assets/node_modules/dropify/dist/css/dropify.min.css')}}">
    <link href="{{asset('eliteadmin/assets/node_modules/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify({
            messages: {
                default: 'arrastre y suelte un archivo aquí o haga clic',
                replace: 'Arrastra y suelta o haz clic para reemplazar ',
                remove: 'Eliminar',
                error: 'Vaya, se agregó algo incorrecto.'
            }
        });
    
            // Used events
            var drEvent = $('#input-file-events').dropify();
    
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
    
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
    
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
    
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
    {{-- 112 / 328 - 107 = 221  34.2 = 65.8 --}}
        <script src="{{asset('eliteadmin/assets/node_modules/dropzone/dist/dropzone.js')}}"></script>
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