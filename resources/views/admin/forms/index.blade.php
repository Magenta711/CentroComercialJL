@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de formularios</h4>
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
                                @can('Ver mensajes de formularios')
                                    <button type="button" class="btn btn-sm btn-primary" alt="default" data-toggle="modal" data-target="#edit-user-modal-{{$item->id}}"><i class="fa fa-check"></i></button>
                                @endcan
                                @can('Dar aprobación a mensajes de formularios')
                                    <a href="#" id="idItem-{{$item->id}}" class="btn btn-sm btn-primary delete-modal">
                                        <i class="fa fa-trash"></i>
                                    </a>
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
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script>
        $(function () {
            $('.delete-modal').click(function () {
                e.preventDefault();
                let id = this.id.split('-')[this.id.split('-').length - 1];
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¡Si elimina el mensaje no prodrás revertirlo!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $('#idItem-'+id).parent().parent().parent().parent().parent().parent().parent().remove();
                        var jqxhr = $.post('/admin/rent/'+id, function name(data) {
                            Swal.fire(
                                'Eliminado!',
                                'El mensaje ha sido eliminado',
                                'success'
                            )
                        })
                        .fail(function() {
                            alert( "error" );
                        });
                    }
                })
            })
        });
    </script>
@endsection