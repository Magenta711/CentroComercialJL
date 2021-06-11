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
                <li class="breadcrumb-item">Carusel</li>
                <li class="breadcrumb-item active">Editar post</li>

            </ol>
        </div>
    </div>
</div>
<form action="{{route('admin_slider.update',1)}}" method="post">
    @csrf
    @method('PUT')
<div class="row">
    <div class="col-md-12">
        <h4 class="card-title">Editar post</h4>
        <h6 class="card-subtitle m-b-20 text-muted">Aquí puedes editar y programar post para el carrusel de entrada de la página</h6>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Imagen</h4>
                <label for="input-file-now">En sugerencia subir una imagen con las dimenciones de 1100*500</label>
                <input type="file" id="input-file-now" class="dropify" accept="image/*" data-default-file="{{asset('eliteadmin/assets/images/big/img1.jpg')}}" />
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Texto</label>
                    <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fecha de publicación</label>
                            <input type="datetime-local" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fecha de terminación</label>
                            <input type="datetime-local" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('eliteadmin/assets/node_modules/dropify/dist/css/dropify.min.css')}}">
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
@endsection