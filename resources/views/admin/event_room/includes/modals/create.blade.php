<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Crear evento</h4>
                <form id="createForm">
                <div class="form-group">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control" name="title" id="titleC">
                </div>
                <div class="form-group">
                    <label for="">Fecha de inicio</label>
                    <input type="datetime-local" class="form-control" name="start" id="startC">
                </div>
                <div class="form-group">
                    <label for="">Fecha de fin</label>
                    <input type="datetime-local" class="form-control" name="end" id="endC">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="button" class="btn btn-primary" id="appointment_create" value="Guardar">
            </div>
        </div>
    </div>
</div>