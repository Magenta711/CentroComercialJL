<div class="card">
    <div class="card-body">
        <div class="card-title">Tienda</div>
        <div class="card-subtitle">Información disponibles en la página de la tienda</div>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="ubications">Marca</label>
                    <p>{{$id->brand}}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Teléfono</label>
                    <p>{{$id->tel}}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Página</label>
                    <p>{{$id->page}}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Publica</label>
                    <p>{{$id->is_page ? 'Si' : 'No'}}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Descripción</label>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->description)) !!}</p>
                </div>
                <div class="form-group">
                    <label for="ubications">Redes sociales</label><br>
                    @foreach ($id->social_medias as $item)
                        <a target="_blank" class="btn btn-circle btn-secondary" href="{{$item->link}}"><i class="fab fa-{{type_social($item->type)}}"></i></a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="card-title">Logo</h4>
                <img src="/storage/avatar/locals/{{$id->avatar}}" alt="{{$id->avatar}}" class="img-thumbnail rounded-circle">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="file">Galeria</label>
                <div class="card-columns el-element-overlay">
                    @if ($id->files)
                        @foreach ($id->files as $item)
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1">
                                        <a class="image-popup-vertical-fit" href="{{$item->url.$item->name}}"> <img src="{{$item->url.$item->name}}" alt="{{$item->name}}" /> </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="file">Productos</label>
            </div>
        </div>
    </div>
</div>