<div id="show-user-modal-{{$item->id}}" class="modal fade modal-show" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                    {{-- <button type="button" class="close" data-bs-dismiss="modal" --}}
                        {{-- aria-hidden="true">×</button> --}}
                </div>
                <div class="modal-body">
                    <h6><strong>Remitente:</strong></h6>
                    <p>{{$item->name}}</p>
                    <p>{{$item->email}}</p>
                    <p>{{$item->tel}}</p>
                    <hr>
                    <h6><strong>Asunto:</strong></h6>
                    <p>{{ isset(json_decode($item->data,true)['afair']) ? json_decode($item->data,true)['afair'] : 'Sin asunto'}}</p>
                    <hr>
                    <h6><strong>Mensaje:</strong></s></h6>
                    <p>{{ isset(json_decode($item->data,true)['message']) ? json_decode($item->data,true)['message'] : 'Sin mensaje'}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn_closed_modal" data-id-="show-user-modal-{{$item->id}}"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="idItemCheck-{{$item->id}}" class="btn btn-sm btn-primary btn-check" alt="default" data-toggle="modal" data-target="#edit-user-modal-{{$item->id}}"><i class="fa fa-check"></i> Visto</button>
                </div>
            </div>
        </div>
    </div>


