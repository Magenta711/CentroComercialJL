<div id="edit-role-modal-{{$item->id}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('roles.update',$item->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body text-left">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" value="{{$item->name}}" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Permisos:</strong>
                        <ul class="list-group">
                            @foreach($permissions as $value)
                                <li class="list-group-item">
                                    <label class="item-permit {{in_array($value->id, $item->getPermissions()) ? 'active' : ''}}">
                                        <input type="checkbox" name="permission[]"value="{{$value->id}}" {{in_array($value->id, $item->getPermissions()) ? 'checked' : ''}}>
                                        {{ $value->name }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>