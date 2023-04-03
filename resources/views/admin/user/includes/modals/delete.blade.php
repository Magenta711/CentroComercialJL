<div id="delete-user-modal-{{$item->id}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('users.delete',$item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body text-left">
                    <p>¿Está seguro de eliminar el usuario {{$item->name}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>