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
                    <li class="breadcrumb-item">Administración de locales</li>
                    <li class="breadcrumb-item active">Rentar</li>
                </ol>
            </div>
        </div>
    </div>
    <form action="{{route('locals.save',$id->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">Rentar local</h4>
            <h6 class="card-subtitle m-b-20 text-muted">
                La mayoria de los campos son son editables por el usuario
            </h6>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Logo</h4>
                    <label for="input-file-now">En sugerencia subir una imagen con las dimenciones de 2:2 y fondo blanco</label>
                    <input type="file" name="file" id="input-file-now" class="dropify" accept="image/*" />
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_id">Usuario</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option selected disabled>Selecciona el usuario</option>
                            @foreach ($users as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand">Marca</label>
                        <input type="text" name="brand" id="brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option selected disabled>Selecciona la categoria</option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Guardar</button>
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
        });
    </script>
@endsection