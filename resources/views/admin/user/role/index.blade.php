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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Administración de usuarios</a></li>
                <li class="breadcrumb-item active">Roles y permisos</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" alt="default" data-toggle="modal" data-target="#create-role-modal"><i class="fa fa-plus-circle"></i> Crear
            </button>
            @include('admin.user.role.includes.modals.create')
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Roles</h4>
        <h6 class="card-subtitle">Lista de roles</h6>
        <p>
            @role('Superadmin')
                I am a super-admin!
            @else
                I am not a super-admin...
            @endrole
        </p>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Permisos</th>
                        <th>/</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{ count($item->permissions) }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" alt="default" data-toggle="modal" data-target="#edit-role-modal-{{$item->id}}"><i class="fa fa-edit"></i></button>
                                @include('admin.user.role.includes.modals.edit')
                                <button type="button" class="btn btn-sm btn-primary" alt="default" data-toggle="modal" data-target="#delete-role-modal-{{$item->id}}"><i class="fa fa-trash"></i></button>
                                @include('admin.user.role.includes.modals.delete')
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
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
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
            $('.item-permit').click(function () {
                let item = $(this).children();
                if (item.is(':checked')) {
                    let item = $(this).parent().addClass('active');
                }else{
                    let item = $(this).parent().removeClass('active');
                }
            });
        });
    </script>
@endsection