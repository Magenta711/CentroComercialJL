@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de usuarios</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Administración de usuarios</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> Crear</button>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Lista de usuarios</h4>
        <h6 class="card-subtitle">Tu puedes agregar, editar y eliminar usuarios</h6>
        <div class="table-responsive">
            <table id="footable-addrow" class="table" data-paging="true" data-filtering="true"
                data-sorting="true" data-editing="true" data-state="true">
            </table>
        </div>
        <!-- Start Popup Model -->
        <div class="modal fade" id="editor-modal" tabindex="-1" role="dialog"
            aria-labelledby="editor-title">
            <div class="modal-dialog" role="document">
                <form class="modal-content form-horizontal" id="editor">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editor-title">Agregar fila</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group required row">
                            <label for="name" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name"
                                    name="name" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="form-group required row">
                            <label for="email" class="col-sm-3 control-label">Correo</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email"
                                    name="email" placeholder="example@mail.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 control-label">Contraseña</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="password"
                                    name="password" placeholder="Contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Popup Model -->
    </div>
</div>
@endsection
@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/footable/css/footable.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('eliteadmin/inverse/dist/css/pages/footable-page.css')}}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/moment/moment.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/footable/js/footable.min.js')}}"></script>
    <script src="{{asset('eliteadmin/inverse/dist/js/pages/footable-init.js')}}"></script>
@endsection