<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="editForm">
                <h4>Editar evento</h4>
                <div class="form-group">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="">Fecha de inicio</label>
                    <input type="datetime-local" class="form-control" name="start" id="start">
                </div>
                <div class="form-group">
                    <label for="">Fecha de fin</label>
                    <input type="datetime-local" class="form-control" name="end" id="end">
                </div>
                <input type="hidden" class="form-control" name="id" id="id">
                <input type="hidden" class="form-control" name="event_id" id="event_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                @can('Editar eventos del salon')
                    <input type="button" class="btn btn-primary" id="appointment_update" value="Guardar">
                @endcan
                @can('Eliminar eventos del salon')
                    <input type="button" class="btn btn-danger" id="appointment_delete" value="Eliminar">
                @endcan
            </div>
        </div>
    </div>
</div>