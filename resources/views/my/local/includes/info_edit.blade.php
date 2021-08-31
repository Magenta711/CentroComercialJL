<div class="row">
    <div class="col-md-12">
        <h4 class="card-title">Local</h4>
        <h6 class="card-subtitle m-b-20 text-muted">
            Los datos son publicados en el espacio de la tienda
        </h6>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Logo</h4>
                <label for="input-file-now">En sugerencia subir una imagen con las dimenciones de 2:2 y fondo blanco</label>
                <input type="file" name="file" id="input-file-now" class="dropify" accept="image/*" data-default-file="/storage/avatar/locals/{{$id->avatar}}" />
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tienda</div>
                <div class="card-subtitle">Información disponibles en la página de la tienda</div>
                <div class="form-group">
                    <label for="brand">Marca</label>
                    <input type="text" name="brand" value="{{$id->brand}}" id="brand" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">Teléfono</label>
                    <input type="tel" name="tel" value="{{$id->tel}}" id="tel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option selected disabled>Selecciona la categoria</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_page">
                        <input type="checkbox" name="is_page" id="is_page" value="1" {{$id->is_page  ? 'checked' : ''}}>
                        Pagina de tiendas
                    </label>
                    <br>
                    <small>Oferta tu marcas en el espacio de tiendas</small>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$id->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="ubications">Redes sociales</label>
                    <div id="destino_social_media">
                    @forelse($id->social_medias as $key => $value)
                        <div class="row mb-2" id="origen_social_media">
                            <div class="col-md-6">
                                <select name="type_social_media[]" id="type_social_media" class="form-control">
                                    <option disabled selected></option>
                                    <option {{$value->type == 'Fecebook' ? 'selected' : ''}} value="Fecebook">Fecebook</option>
                                    <option {{$value->type == 'Instagram' ? 'selected' : ''}} value="Instagram">Instagram</option>
                                    <option {{$value->type == 'Whatsapp' ? 'selected' : ''}} value="Whatsapp">Whatsapp</option>
                                    <option {{$value->type == 'Twiter' ? 'selected' : ''}} value="Twiter">Twiter</option>
                                    <option {{$value->type == 'YouTube' ? 'selected' : ''}} value="YouTube">Página Web</option>
                                    <option {{$value->type == 'LinkedIn' ? 'selected' : ''}} value="LinkedIn">LinkedIn</option>
                                    <option {{$value->type == 'Página' ? 'selected' : ''}} value="Página Web">Página Web</option>
                                    <option {{$value->type == 'Otra' ? 'selected' : ''}} value="Otra">Otra</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="url" name="link_social_media[]" class="form-control" value="{{$value->link}}" placeholder="https://example.com" pattern="https://.*">
                            </div>
                        </div>
                    @empty
                        <div class="row mb-2" id="origen_social_media">
                            <div class="col-md-6">
                                <select name="type_social_media[]" id="type_social_media" class="form-control">
                                    <option disabled selected></option>
                                    <option value="Fecebook">Fecebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Whatsapp">Whatsapp</option>
                                    <option value="Twiter">Twiter</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="Página Web">Página Web</option>
                                    <option value="Otra">Otra</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="url" name="link_social_media[]" class="form-control" placeholder="https://example.com" pattern="https://.*">
                            </div>
                        </div>
                    @endforelse
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-link" id="btn_add_social_media">
                                <i class="fa fa-plus"></i> Agrear otra red social
                            </button>
                        </div>
                        <div class="col-auto text-right">
                            <a href="#" class="btn btn-sm btn-link">
                                <i class="fas fa-info"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
