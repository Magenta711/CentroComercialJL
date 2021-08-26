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
            @can('Crear usuarios')
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15" alt="default" data-toggle="modal" data-target="#create-user-modal"><i class="fa fa-plus-circle"></i> Crear</button>
                @include('admin.user.includes.modals.create')
            @endcan
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Usuarios</h4>
        <h6 class="card-subtitle">Lista de usuarios</h6>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Fecha confirmación</th>
                        <th>/</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                @foreach ($item->getRoleNames() as $role)
                                    <span class="badge badge-pill badge-primary  text-white ml-auto">
                                        {{$role}}
                                    </span>
                                @endforeach
                            </td>
                            <td>{{$item->email_verified_at}}</td>
                            <td>
                                @can('Editar usuarios')
                                    <button type="button" class="btn btn-sm btn-primary" alt="default" data-toggle="modal" data-target="#edit-user-modal-{{$item->id}}"><i class="fa fa-edit"></i></button>
                                    @include('admin.user.includes.modals.edit')
                                @endcan
                                @can('Eliminar usuarios')
                                    <button type="button" class="btn btn-sm btn-primary" alt="default" data-toggle="modal" data-target="#delete-user-modal-{{$item->id}}"><i class="fa fa-trash"></i></button>
                                    @include('admin.user.includes.modals.delete')
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('eliteadmin/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('eliteadmin/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('eliteadmin/assets/node_modules/select2/dist/css/select2.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            $(".select2").select2();
        });

    </script>
@endsection