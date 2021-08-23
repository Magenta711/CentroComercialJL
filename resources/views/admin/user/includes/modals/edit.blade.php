<div id="edit-user-modal-{{$item->id}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('users.update',$item->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body text-left">
                    <p><small class="text-muted">Se enviará correo de bienvenida junto con las credenciales de ingreso</small></p>
                    <div class="form-group">
                        <label for="name" class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" placeholder="Nombre completo">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Correo</label>
                        <input type="email" class="form-control" id="mail" name="email" value="{{$item->email}}" placeholder="example@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="roles" class="control-label">Rol</label>
                        <select name="roles[]" id="roles" class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                            @foreach ($roles as $role)
                                <option {{$item->hasRole($role->name) ? 'selected' : ''}} value="{{$role->id}}"> {{$role->name}}</option>
                            @endforeach
                        </select>
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