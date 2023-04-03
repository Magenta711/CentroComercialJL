@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de productos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Administración de mis locales</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </div>
    </div>
</div>
<div class="row el-element-overlay">
    <div class="col-lg-12">
        <form action="{{route('my.local.product.store',$id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!--/span-->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Avatar</h4>
                            <label for="input-file-now">En sugerencia subir una imagen con las dimenciones de 2:2 y fondo blanco</label>
                            <input type="file" name="file" id="input-file-now" class="dropify" accept="image/*" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-body">
                                <h5 class="card-title">Crear productos</h5>
                                <hr>
                                <div class="form-group">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" id="firstName" name="name" class="form-control">
                                </div>
                                {{-- <div class="form-group">
                                    <label class="form-label">Cantidad</label>
                                    <input type="number" id="firstName" name="amount" class="form-control">
                                </div> --}}
                                <div class="form-group">
                                    <label class="form-label">Precio</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="ti-money"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="price" placeholder="000.000" aria-label="price" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="form-group">
                                    <label class="form-label">Estado</label>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="status0" value="1" name="status" class="form-check-input">
                                        <label class="form-check-label" for="status0">Publicación</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="status1" value="0" name="status" class="form-check-input">
                                        <label class="form-check-label" for="status1">Oculto</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="status2" value="2" name="status" class="form-check-input">
                                        <label class="form-check-label" for="status2">Borrador</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Descripción</label>
                                    <textarea class="form-control" rows="4" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">Información general</h5>
                                    <h5 class="card-subtitle m-b-20 text-muted">El campo item y descripción son obligatorios, si alguno de estos campos queda basido no se respaldará el dato</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered td-padding">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Descripción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="destino_item">
                                                <tr id="origen_item">
                                                    <td>
                                                        <input type="text" class="form-control" name="item[]" placeholder="Ej: Color">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="description_item[]" placeholder="Ej: Rojo">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-link btn-add"><i class="plus"></i> Agregar item</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-footer">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i> Guardar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
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
            $('.btn-add').click(function () {
                $('#origen_item').clone().appendTo('#destino_item').find('input').val('');
            });
        });
    </script>
@endsection