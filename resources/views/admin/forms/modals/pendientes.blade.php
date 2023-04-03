<div class="modal fade modal-pendiente" id="pendienteModal-{{$events->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Reserva</h4>
                        {{-- <button type="button" class="close" data-bs-dismiss="modal" --}}
                            {{-- aria-hidden="true">×</button> --}}
                    </div>
                    <div class="modal-body">
                        <h6><strong>Remitente:</strong></h6>
                        <p>{{$events->name}}</p>
                        <p>{{$events->email}}</p>
                        <p>{{$events->telefono}}</p>
                        <hr>
                        <h6><Strong>Fecha de reserva:</Strong></h6>
                        <p>{{\Carbon\Carbon::parse($events->date_reserva)->format('d/m/Y')}}</p>
                        <hr>
                        <h6><strong>Descripción: </strong></h6>
                        {{-- {{-- <p>{{ isset(json_decode($events->data,true)['afair']) ? json_decode($events->data,true)['afair'] : 'Sin asunto'}}</p>
                     ><strong>Mensaje:</strong></s></h6> --}}
                        <p>{{ isset($events->description) ? $events->description : 'Sin mensaje'}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn_closed_modal" data-id-="show-user-modal-{{$events->id}}"
                            data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" id="ideventsCheck-{{$events->id}}" class="btn btn-sm btn-primary btn-check" alt="default" data-toggle="modal" data-target="#edit-user-modal-{{$events->id}}"><i class="fa fa-check"></i> Visto</button>
                    </div>
                </div>
            </div>
        </div>
