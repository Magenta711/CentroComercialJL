@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de formularios de contacto</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Administración de formularios</li>
            </ol>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Mensajes</h4>
        <h6 class="card-subtitle">Lista de mesajes</h6>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Origen</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        <th>/</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->tel}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" alt="default" data-toggle="modal" data-target="#edit-user-modal-{{$item->id}}"><i class="fa fa-check"></i></button>
                                @include('admin.user.includes.modals.edit')
                                <button type="button" class="btn btn-sm btn-primary" alt="default" data-toggle="modal" data-target="#delete-user-modal"><i class="fa fa-trash"></i></button>
                                @include('admin.user.includes.modals.delete')
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
                },
                language: {
                    lengthMenu:       "Mostrar _MENU_ entradas",
                    zeroRecords:      "No se encontro registros",
                    search:           "Buscar",
                    paginate: {
                        first:    '«',
                        previous: '‹',
                        next:     '›',
                        last:     '»'
                    },
                    aria: {
                        paginate: {
                            first:    'First',
                            previous: 'Previous',
                            next:     'Next',
                            last:     'Last'
                        }
                    },
                    info:             "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    infoFiltered:     "(filtrado de _MAX_ registros totales)",
                    infoEmpty:        "Mostrando 0 a 0 de 0 entradas"
                },
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });
    </script>
@endsection