@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de página</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item">Administración de página</li>
                <li class="breadcrumb-item active">Carusel</li>
            </ol>
            <a href="{{route('admin_slider.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Crear
            </a>
        </div>
    </div>
</div>
<div class="row el-element-overlay">
    <div class="col-md-12">
        <h4 class="card-title">Carusel</h4>
        <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1"> <img src="{{asset('eliteadmin/assets/images/big/img1.jpg')}}" alt="user" />
                    <div class="el-overlay">
                        <ul class="el-info">
                            <li>
                                <a class="btn default btn-outline image-popup-vertical-fit show-modal">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin_slider.edit',1)}}" class="btn default btn-outline image-popup-vertical-fit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <a  class="btn default btn-outline image-popup-vertical-fit delete-modal">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="el-card-content">
                    <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                    <br/> </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{asset('eliteadmin/inverse/dist/css/pages/user-card.css')}}" rel="stylesheet">
@endsection

@section('js')
    <script>
        $('#show-modal').click(function () {
            Swal.fire({
                title: "Govinda!",
                text: "Recently joined twitter",
                imageUrl: "/eliteadmin/assets/images/big/img1.jpg"
            });
        });
        $('#delete-modal').click(function () {
            Swal.fire({
                title: '¿Está seguro?',
                text: "¡Si elimina la imagen no prodrás revertirlo!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection