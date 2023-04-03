@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Calendario de eventos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">Calendario de eventos</li>
            </ol>
            @can('Crear eventos del salon')
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15" alt="default" data-toggle="modal" data-target="#createModal">
                    <i class="fa fa-plus-circle"></i> Crear</button>
                    <button type="button" class="btn btn-success d-none d-lg-block m-l-15" alt="default" data-toggle="modal" data-target="#bs-exElite-modal-lg">
                    <i class="fa fa-plus-circle"></i>Rersevas</button>
            @endcan
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Salón de Eventos</h4>
        <h6 class="card-subtitle">Agendamiento</h6>
        {{-- <div class="card">
            <div class="card-body b-l calender-sidebar">
                <div id="calendar"></div>
            </div>
        </div>
        <div class="modal-body">
            {{-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> --}}
                        <table class="table table-striped-columns">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Fecha de reserva</th>
                                    <th>Estado</th>
                                    <th>/</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $events)
                                    <tr>
                                        <td>{{$events->name}}</td>
                                        <td>{{$events->email}}</td>
                                        <td>{{$events->telefono}}</td>
                                        <td>{{\Carbon\Carbon::parse($events->date_reserva)->format('d/m/Y')}}</td>
                                        <td>{{$events->state==1 ? "Pendiente" : "Agendado" }}</td>
                                        <td><span class="badge badge-pill badge-primary text-white ml-auto" id="status-{{$events->id}}">{{$events->state==1 ? 'Pendiente' : 'Agendado' }}</span></td>
                                        <td><button type="button" id="idItemShow-{{$events->id}}" class="btn btn-sm btn-primary show-modal" alt="default" data-toggle="modal" data-target="#bs-exElite-modal-lg"><i class="fa fa-eye"></i></button></td>
                                    </tr>
                                    {{-- @include('admin.event_room.includes.modals.pendientes') --}}
                                @endforeach
                            </tbody>
                        </table>
    {{-- </div> --}}
    </div>
</div>
@if (auth()->user()->hasAnyPermission(['Editar eventos del salon','Eliminar eventos del salon','Ver eventos del salon']))
    @include('admin.event_room.includes.modals.edit')
@endif
@can('Crear eventos del salon')
    @include('admin.event_room.includes.modals.create')
    @include('admin.event_room.includes.modals.events_modal')
@endcan
@endsection

@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('eliteadmin/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/fullcalendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/moment/moment.js')}}"></script>
    <script src='{{asset('eliteadmin/assets/node_modules/fullcalendar/dist/fullcalendar.min.js')}}'></script>
    <script src='{{asset('eliteadmin/assets/node_modules/sparkline/jquery.sparkline.min.js')}}'></script>
    <script src='{{asset('eliteadmin/assets/node_modules/fullcalendar/dist/locale/es.js')}}'></script>
    <script src="{{asset('eliteadmin/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script>
     $('.btn_closed_modal').click(function () {
                $('.modal-event-room').modal('hide');
            });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btn-check').click(function () {
                let id = this.id.split('-')[this.id.split('-').length -1];
                var jqxhr = $.post('/formularios/check/'+id+'?&_token='+$('meta[name="csrf-token"]').attr('content'), function name(data) {
                    $('#status-'+id).text('Agendada');
                })
                .fail(function() {
                    // alert( "error" );
                });
            });

    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "/admin/servicios/salon_eventos",
            displayEventTime: false,
            eventLimit: true,
            defaultView: 'month',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                        event.allDay = true;
                } else {
                        event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            @can('Crear eventos del salon')
            select: function (start, end, allDay) {
                $('#titleC').val('');
                $('#startC').val(moment(start).format('YYYY-MM-DD')+"T"+moment(start).format('HH:mm'));
                $('#endC').val(moment(end).format('YYYY-MM-DD')+"T"+moment(end).format('HH:mm'));
                $('#createModal').modal();
            },
            @endcan
            @can('Editar eventos del salon')
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                $.ajax({
                    url: '/admin/servicios/salon_eventos/'+event.id+'/edit?title=' + event.title + '&start=' + start + '&end=' + end,
                    data: 'title=' + event.title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 1000000,
                    beforeSend: function(){
                        // console.log('Editando evento');
                    },
                    success: function (data) {
                        displayMessage("Evento actualizado");
                    }
                });
            },
            @endcan
            @if(auth()->user()->hasAnyPermission(['Editar eventos del salon','Eliminar eventos del salon','Ver eventos del salon']))
            eventClick: function (event, jsEvent, view) {
                $('#event_id').val(event._id);
                $('#id').val(event.id);
                $('#title').val(event.title);
                $('#start').val(moment(event.start).format('YYYY-MM-DD')+"T"+moment(event.start).format('HH:mm'));
                $('#end').val(moment(event.end).format('YYYY-MM-DD')+"T"+moment(event.end).format('HH:mm'));
                $('#editModal').modal();
                $('#appointment_update').click(function () {
                    let event_id = $('#event_id').val();
                    let id = $('#id').val();
                    let title = $('#title').val();
                    let start = $('#start').val();
                    let end = $('#end').val();
                    let form = $("#editForm")[0];
                    data = new FormData(form);
                    if (title != '' && start != '' && end != '') {
                        $.ajax({
                            type: "POST",
                            url: '/admin/servicios/salon_eventos/'+id+'/edit',
                            data: data,
                            processData: false,
                            contentType: false,
                            cache: false,
                            timeout: 1000000,
                            beforeSend: function(){
                                // console.log('Editando evento');
                            },
                            success: function (data) {
                                event.title = title;
                                event.start = start;
                                event.end = end;
                                calendar.fullCalendar('updateEvent',event);
                                displayMessage("Evento actualizado");
                            }
                        });
                        $('#editModal').modal('hide');
                    }else {
                        alert('Todos los campos son obligatorios');
                    }
                });
            }
        });
        @endif
        @can('Crear eventos del salon')
        $('#appointment_create').click(function () {
            let title = $('#titleC').val();
            let start = $('#startC').val();
            let end = $('#endC').val();
            let form = $("#createForm")[0];
            data = new FormData(form);
            if (title != '' && start != '' && end != '') {
                $.ajax({
                    type: "POST",
                    url: '/admin/servicios/salon_eventos',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 1000000,
                    beforeSend: function(){
                        // console.log('Creando evento');
                    },
                    success: function (data) {
                        // console.log('data',data);
                        calendar.fullCalendar('renderEvent',
                        {
                            id: data.id,
                            title: title,
                            start: start,
                            end: end,
                            allDay: false
                        },true);
                        calendar.fullCalendar('unselect');
                        displayMessage("Evento creado");
                    }
                });
                $('#createModal').modal('hide');
            }else {
                alert('Todos los campos son obligatorios');
            }
        });
        @endcan
        @can('Eliminar eventos del salon')
        $('#appointment_delete').click(function () {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                let event_id = $('#event_id').val();
                let id = $('#id').val();

                $.ajax({
                    type: "POST",
                    url: '/admin/servicios/salon_eventos/'+id,
                    data: {
                            id: id,
                    },
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 1000000,
                    beforeSend: function(){
                        // console.log('Eliminado evento');
                    },
                    success: function (response) {
                        calendar.fullCalendar('removeEvents', event_id);
                        displayMessage("Evento eliminado");
                    }
                });
                $('#editModal').modal('hide');
            }
        });
        @endcan
    });

    function displayMessage(message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: message
        })
    }
    </script>
@endsection
