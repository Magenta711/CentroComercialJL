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

<div class="col-md-12">
    <h4 class="card-title">Local</h4>
    <h6 class="card-subtitle m-b-20 text-muted">
        Los datos son publicados en el espacio de la tienda
    </h6>
</div>

<div class="row">

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tienda</div>
                <form action="{{route('admin_rents.update',$id->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Logo</h4>
                                <label for="input-file-now">En sugerencia subir una imagen con las dimensiones de 2:2 y fondo blanco</label>
                                <input type="file" name="file" id="input-file-now" class="dropify" accept="image/*" data-default-file="/storage/avatar/locals/{{$id->avatar}}" />
                            </div>
                        </div>
                    </div>
                    <div class="card-subtitle">Información disponibles en la página de la tienda</div>
                    <div class="form-group">
                        <label for="brand">Marca</label>
                        <input type="text" name="brand" value="{{$id->brand}}" id="brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tel">Teléfono</label>
                        <input type="tel" name="tel" value="{{$id->tel}}" id="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option selected disabled>Selecciona la categoria</option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_page">
                            <input type="checkbox" name="is_page" id="is_page" value="1" {{$id->is_page  ? 'checked' : ''}}>
                            Pagina de tiendas
                        </label>
                        <br>
                        <small>Oferta tu marcas en el espacio de tiendas</small>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$id->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="ubications">Redes sociales</label>
                        <div id="destino_social_media">
                        @forelse($id->social_medias as $key => $value)
                            <div class="row mb-2" id="origen_social_media">
                                <div class="col-md-6">
                                    <select name="type_social_media[]" id="type_social_media" class="form-control">
                                        <option disabled selected></option>
                                        <option {{$value->type == 'Fecebook' ? 'selected' : ''}} value="Fecebook">Fecebook</option>
                                        <option {{$value->type == 'Instagram' ? 'selected' : ''}} value="Instagram">Instagram</option>
                                        <option {{$value->type == 'Whatsapp' ? 'selected' : ''}} value="Whatsapp">Whatsapp</option>
                                        <option {{$value->type == 'Twiter' ? 'selected' : ''}} value="Twiter">Twiter</option>
                                        <option {{$value->type == 'YouTube' ? 'selected' : ''}} value="YouTube">Página Web</option>
                                        <option {{$value->type == 'LinkedIn' ? 'selected' : ''}} value="LinkedIn">LinkedIn</option>
                                        <option {{$value->type == 'Página' ? 'selected' : ''}} value="Página Web">Página Web</option>
                                        <option {{$value->type == 'Otra' ? 'selected' : ''}} value="Otra">Otra</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="url" name="link_social_media[]" class="form-control" value="{{$value->link}}" placeholder="https://example.com" pattern="https://.*">
                                </div>
                            </div>
                        @empty
                            <div class="row mb-2" id="origen_social_media">
                                <div class="col-md-6">
                                    <select name="type_social_media[]" id="type_social_media" class="form-control">
                                        <option disabled selected></option>
                                        <option value="Fecebook">Fecebook</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Whatsapp">Whatsapp</option>
                                        <option value="Twiter">Twiter</option>
                                        <option value="LinkedIn">LinkedIn</option>
                                        <option value="Página Web">Página Web</option>
                                        <option value="Otra">Otra</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="url" name="link_social_media[]" class="form-control" placeholder="https://example.com" pattern="https://.*">
                                </div>
                            </div>
                        @endforelse
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-link" id="btn_add_social_media">
                                    <i class="fa fa-plus"></i> Agrear otra red social
                                </button>
                            </div>
                            <div class="col-auto text-right">
                                <a href="#" class="btn btn-sm btn-link">
                                    <i class="fas fa-info"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="row">
                    <div class="col-md-12" >
                        <label for="files">Galeria</label>
                        <form action="{{route('files.upload',[$id->id,4])}}" class="dropzone" id="myAwesomeDropzone">
                            @csrf
                            <div class="fallback">
                                <input name="files" type="file" multiple />
                            </div>
                        </form>
                    </div>
                </div>
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
        // $(document).ready(function() {
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
                            echo "myDropzone.displayExistingFile({ name: '".$value->name."', size: '".$value->size."' }, '/storage/upload/".$value->name."');

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
        // });
    </script>
@endsection
