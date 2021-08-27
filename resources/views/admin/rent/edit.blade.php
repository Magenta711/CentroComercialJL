@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de rentas</h4>
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
<form action="{{route('admin_rents.update',$id->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@include('my.local.includes.info_edit')
</form>
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

            $('#btn_add_social_media').click(function () {
                $('#origen_social_media').clone().appendTo('#destino_social_media');
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