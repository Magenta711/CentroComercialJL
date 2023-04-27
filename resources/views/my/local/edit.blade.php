@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de mis locales</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item">Administración de mis locales</li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>
</div>
<form action="{{route('my.local.update',$id->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@include('my.local.includes.info_edit')
</form>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <label for="file">Galeria</label>
                <form action="{{route('files.upload',[$id->id,4])}}" class="dropzone" id="myAwesomeDropzone">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" multiple  />
                        <i class="fa fa-trash" data-dz-remove onclick="removeFile(this)"></i>
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
    <script src="{{asset('eliteadmin/assets/node_modules/dropzone/dist/dropzone.js')}}"></script>
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
                $('#origen_social_media').clone().appendTo('#destino_social_media').find('input').val('');
            });

            Dropzone.options.myAwesomeDropzone = {
                dictDefaultMessage: 'Carga los archivos aquí o de clic',
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                headers: {
                    "Accept": "application/json",
                    "Cache-Control": "no-cache",
                    "X-Requested-With": "XMLHttpRequest",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dictRemoveFileConfirmation: "¿Está seguro de eliminar el archivo?",
                init: function() {
                    let myDropzone = this;

                    @php
                        if ($id->files) {
                            foreach ($id->files as $key => $value) {
                                echo "mockFile = { name: '".$value->name."', size: '".$value->size."' };
                                myDropzone.displayExistingFile(mockFile, '/storage/upload/".$value->name."');

                                ";
                            }
                        }
                    @endphp


                    myDropzone.on("removedfile", function(file) {
                        $url = '/files_load?name='+file.name+'&_token='+$('meta[name="csrf-token"]').attr('content');
                        var jqxhr = $.post($url, function (data) {
                            console.log(data);
                        })
                        .fail(function() {
                            console.log("error");
                        });
                    });
                }
            };
            $('.btn-send').click(function () {
                $('#form-main').submit();
            });
        });
    </script>
@endsection
