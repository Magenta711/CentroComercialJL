@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de locales</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item">Administración de Locales</li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">Crear local</div>
        <h6 class="card-subtitle">Todos los campos con * son obligatorios</h6>
        <form action="{{route('locals.store')}}" method="post" id="form-main">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ubication">Ubicación *</label>
                    <input type="text" name="ubication" id="ubication" value="{{old('ubication')}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Código *</label>
                    <input type="text" name="code" id="code" value="{{old('code')}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dimensions">Dimeciones *</label>
                    <input type="text" name="dimensions" id="dimensions" value="{{old('dimensions')}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="value">Valor *</label>
                    <input type="text" name="value" id="value" value="{{old('value')}}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Tipo *</label>
                    <select name="type" id="type" class="form-control">
                        <option selected></option>
                        <option {{old('type') == 'office' ? 'selected' : ''}} value="office">Oficina</option>
                        <option {{old('type') == 'local' ? 'selected' : ''}} value="local">Local</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="publish">
                        <input type="checkbox" name="publish" id="publish" value="1" {{ old('publish') ? 'checked' : '' }}>
                        Pagina de locales
                    </label>
                    <br>
                    <small>Cuando el local este disponible se ofertara en el listado de locales disponibles</small>
                </div>
            </div>
            <div class="col-md-12">
                <label for="description">Descripción *</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
            </div>
        </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary btn-send">Guardar</button>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('.btn-send').click(function () {
            $('#form-main').submit();
        });
    </script>
@endsection