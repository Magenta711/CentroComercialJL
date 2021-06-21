@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Calendar</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">Calendar</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15">
                <i class="fa fa-plus-circle"></i> Create New</button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card-body">
                            <h4 class="card-title m-t-10">Arrastra y suelta el evento</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="calendar-events" class="">
                                        <div class="calendar-events" data-class="bg-info">
                                            <i class="fa fa-circle text-info"></i> Familiar
                                        </div>
                                    </div>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                                            <i class="ti-plus"></i> Agregar nuevo evento
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card-body b-l calender-sidebar">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN MODAL -->
<div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <strong>Agregar evento</strong>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light">Crear evento</button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Category -->
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <strong>Agregar</strong> una categoria
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Color</label>
                            <select class="form-control form-white" data-placeholder="Cambia el color" name="category-color">
                                <option value="success">Verde</option>
                                <option value="danger">Rojo</option>
                                <option value="info">Azul</option>
                                <option value="primary">Piel</option>
                                <option value="warning">Amarillo</option>
                                <option value="inverse">Negro</option>
                                <option value="purple">Morado</option>
                                <option value="pink">Celeste</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">Date time</label>
                            <input type="text" name="date-time" class="form-control datetime">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Guardar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection

@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('eliteadmin/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/fullcalendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/moment/moment.js')}}"></script>
    <script src='{{asset('eliteadmin/assets/node_modules/fullcalendar/dist/fullcalendar.min.js')}}'></script>
    <script src='{{asset('eliteadmin/assets/node_modules/fullcalendar/dist/locale/es.js')}}'></script>
    <script src="{{asset('eliteadmin/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    !function($) {
        "use strict";

        var CalendarApp = function() {
            this.$body = $("body")
            this.$calendar = $('#calendar'),
            this.$event = ('#calendar-events div.calendar-events'),
            this.$categoryForm = $('#add-new-event form'),
            this.$extEvents = $('#calendar-events'),
            this.$modal = $('#my-event'),
            this.$saveCategoryBtn = $('.save-category'),
            this.$calendarObj = null,
            this.$lenguage = 'es'
        };


        // /* on drop */
        CalendarApp.prototype.onDrop = function (eventObj, date) { 
            console.log('OnDrop');
            var $this = this; 
                var originalEventObject = eventObj.data('eventObject');
                var $categoryClass = eventObj.attr('data-class');
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);
                // assign it the date that was reported
                copiedEventObject.start = date;
                if ($categoryClass)
                    copiedEventObject['className'] = [$categoryClass];
                // render the event on the calendar
                $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    eventObj.remove();
                }
        },
        /* on click on event */
        CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
            console.log('OnEventClick');
            var $this = this;
                var form = $("<form></form>");
                form.append("<label>Cambiar el evento</label>");
                form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Guardar</button></span></div>");
                $this.$modal.modal({
                    backdrop: 'static'
                });
                $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                    $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                        return (ev._id == calEvent._id);
                    });
                    $this.$modal.modal('hide');
                });
                $this.$modal.find('form').on('submit', function () {
                    calEvent.title = form.find("input[type=text]").val();
                    $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                    $this.$modal.modal('hide');
                    return false;
                });
        },
        /* on select */
        CalendarApp.prototype.onSelect = function (start, end, allDay) {
            console.log('OnSelect');
            console.log(start);
            console.log(end);
            var $this = this;
                $this.$modal.modal({
                    backdrop: 'static'
                });
                // moment(start).format('YYYY-MM-DD HH:mm:sss')
                var form = $("<form></form>");
                form.append("<div class='row'></div>");
                form.find(".row")
                    .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Evento</label><input class='form-control' placeholder='Ingresa el nombre del evento' type='text' name='title'/></div></div>")
                    .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Categoria</label><select class='form-control' name='category'></select></div></div>")
                    .append("<div class='col-md-12'><div class='form-group'><label class='control-label'>Fecha</label><input type='text' name='beginning' class='form-control datetime' value='"+moment(start).format('DD/MM/YYYY h:mm A')+" "+moment(end).subtract(1,'hours').format('DD/MM/YYYY h:mm A')+"' /></div></div>")
                    .find("select[name='category']")
                        @foreach($categories as $category)
                        .append("<option value='{{$category}}'>{{$category->title}}</option>")
                        @endforeach
                        .append("</div></div>");
                $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                    form.submit();
                });
                $this.$modal.find('.datetime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 10,
                    startDate:moment(start).format('DD/MM/YYYY h:mm A'),
                    endDate:moment(end).format('DD/MM/YYYY h:mm A'),
                    locale: {
                        format: 'DD/MM/YYYY h:mm A'
                    }
                });
                $this.$modal.find('form').on('submit', function () {
                    var title = form.find("input[name='title']").val();
                    var beginning = form.find("input[name='beginning']").val().split(' - ');
                    var ending = form.find("input[name='ending']").val();
                    start = beginning[0];
                    let arrstart = start.split(" ");
                    if (arrstart[2] == 'AM') {
                        start = arrstart[0]+' '+arrstart[1];
                    }else {
                        let arrhour = arrstart[1].split(':');
                        let hour = parseInt(arrhour[0])+12;
                        let minutes = arrhour[0];
                        start = arrstart[0]+' '+hour+':'+minutes;
                    }
                    end = beginning[1];
                    let arrend = end.split(" ");
                    if (arrend[2] == 'AM') {
                        end = arrend[0]+' '+arrend[1];
                    }else {
                        let arrhour = arrend[1].split(':');
                        let hour = parseInt(arrhour[0])+12;
                        let minutes = arrhour[0];
                        end = arrend[0]+' '+hour+':'+minutes;
                    }
                    var date = moment(start,'DD/MM/YYYY HH:mm');
                    start = date.format('x');
                    var date = moment(end,'DD/MM/YYYY HH:mm');
                    end = date.format('x');
                    start = moment(start,'x');
                    end = moment(end,'x');
                    console.log(start);
                    console.log(end);
                    var categoryClass = form.find("select[name='category'] option:checked").val();
                    if (title !== null && title.length != 0) {
                        // Crear
                        $this.$calendarObj.fullCalendar('renderEvent', {
                            title: title,
                            start:start,
                            end: end,
                            allDay: false,
                            className: categoryClass
                        }, true);  
                        $this.$modal.modal('hide');
                    }
                    else{
                        alert('You have to give a title to your event');
                    }
                    return false;
                    
                });
                $this.$calendarObj.fullCalendar('unselect');
        },
        CalendarApp.prototype.enableDrag = function() {
            console.log('EnableDrag');
            //init events
            $(this.$event).each(function () {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });
            });
        },
        /* Initializing */
        CalendarApp.prototype.init = function() {
            console.log('init');
            this.enableDrag();
            /*  Initialize the calendar  */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var form = '';
            var today = new Date($.now());

            var defaultEvents =  [
                @foreach ($events as $event)
                    @php
                        $start = explode(" ",$event['start']);
                        $end = explode(" ",$event['end']);
                        if ($start[1] == '00:00:00') {
                            $start = $start[0];
                        }else {
                            $start = $event['start'];
                        }
                        if ($end[1] == '00:00:00') {
                            $end = $end[0];
                        }else {
                            $end = $event['end'];
                        }
                    @endphp
                    {
                        id: $event->id,
                        title: $event->title,
                        start: $event->start,
                        end: $event->end,
                        category: $event->category->color,
                    },
                @endforeach
            //     // {
            //     //     title: 'Released Ample Admin!',
            //     //     start: new Date($.now() + 506800000),
            //     //     className: 'bg-info'
            //     // },
            ];

            var $this = this;
            $this.$calendarObj = $this.$calendar.fullCalendar({
                slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                defaultView: 'month',  
                handleWindowResize: true,   
                
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: defaultEvents,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                drop: function(date) { $this.onDrop($(this), date); },
                select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
                eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

            });

        //     //on new event
            this.$saveCategoryBtn.on('click', function(){
                console.log('save');
                var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
                var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
                var dateTime = $this.$categoryForm.find("input[name='date-time']").val();
                console.log(dateTime);
                if (categoryName !== null && categoryName.length != 0) {
                    $this.$extEvents.append('<div class="calendar-events" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-circle text-' + categoryColor + '"></i>' + categoryName + '</div>')
                    $this.enableDrag();
                }

            });
        },
    //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
        
    }(window.jQuery),

    //initializing CalendarApp
    function($) {
        "use strict";
        $.CalendarApp.init()
    }(window.jQuery);
    </script>
@endsection