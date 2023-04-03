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
                        <th style="min-width: 100px">Teléfono</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th style="min-width: 50px">/</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->tel}}</td>
                            <td>
                                {{$item->created_at -> format('d-m-Y')}}
                                <input type="hidden" class="hide" value="{{$item->tel}}" id="tel-{{$item->id}}">
                                <input type="hidden" class="hide" value="{{ isset(json_decode($item->data,true)['afair']) ? json_decode($item->data,true)['afair'] : ''}}" id="afair-{{$item->id}}">
                                <input type="hidden" class="hide" value="{{ isset(json_decode($item->data,true)['message']) ? json_decode($item->data,true)['message'] : ''}}" id="message-{{$item->id}}">
                            </td>
                            <td><span class="badge badge-pill badge-primary text-white ml-auto" id="status-{{$item->id}}">{{$item->status ? 'Visto' : 'Sin ver' }}</span></td>
                            <td>
                                {{-- @can('Dar aprobación a mensajes de formularios') --}}
                                {{-- @can('Ver mensajes de formularios') --}}
                                    <button type="button" id="idItemShow-{{$item->id}}" class="btn btn-sm btn-primary show-modal" alt="default" data-toggle="modal" data-target="#show-user-modal-{{$item->id}}"><i class="fa fa-eye"></i></button>
                                    {{-- <a href="#" id="idItem-{{$item->id}}" class="btn btn-sm btn-primary delete-modal">
                                        <i class="fa fa-trash"></i>
                                    </a> --}}
                                    <button href="#" id="idItem-{{$item->id}}" class="btn btn-sm btn-primary delete-modal"><i class="fa fa-trash"></i>  </button>
                                {{-- @endcan --}}
                                {{-- @endcan --}}
                            </td>
                        </tr>
                        @include('admin.forms.modals.show_modal')
                    @endforeach
                    @foreach ($event_room as $events)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>Salón de eventos</td>
                            <td>{{$events->name}}</td>
                            <td>{{$events->email}}</td>
                            <td>{{$events->telefono}}</td>
                            <td>{{$events->created_at -> format('d-m-Y')}}</td>
                            <td><span class="badge badge-pill badge-primary text-white ml-auto" id="status-{{$events->id}}">{{$events->state ? 'Visto' : 'Sin ver' }}</span></td>
                            <td><button type="button" id="idItemShow-{{$events->id}}" class="btn btn-sm btn-primary show-modal" alt="default" data-toggle="modal" data-target="#pendienteModal-{{$events->id}}"><i class="fa fa-eye"></i></button></td>
                        </tr>
                        @include('admin.forms.modals.pendientes')
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
            $('.btn_closed_modal').click(function () {
                $('.modal-show').modal('hide');
                $('.modal-pendiente').modal('hide');
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btn-check').click(function () {
                let id = this.id.split('-')[this.id.split('-').length - 1];
                var jqxhr = $.post('/formularios/check/'+id+'?&_token='+$('meta[name="csrf-token"]').attr('content'), function name(data) {
                    $('#status-'+id).text('Visto');
                })
                .fail(function() {
                    // alert( "error" );
                });
            });

            $('.delete-modal').click(function (e) {
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
                        $('#idItem-'+id).parent().parent().remove();
                        var jqxhr = $.post('/formularios/'+id+'?&_token='+$('meta[name="csrf-token"]').attr('content'), function name(data) {
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
