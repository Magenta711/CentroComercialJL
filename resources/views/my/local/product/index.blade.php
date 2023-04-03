@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de productos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Administración de locales</a></li>
                <li class="breadcrumb-item active">Administración de productos</li>
            </ol>
            <a href="{{route('my.local.product.create',$id)}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Crear</a>
        </div>
    </div>
</div>
<div class="row el-element-overlay">
    <div class="col-sm-12">
        <h4 class="card-title">productos</h4>
        <h6 class="card-subtitle">Lista de productos</h6>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table stylish-table">
                        <thead>
                            <tr>
                                <th style="width:90px;">Producto</th>
                                <th>Descripción</th>
                                {{-- <th>Cantidad</th> --}}
                                <th>Precio</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $item)
                                <tr>
                                    <td>
                                        <span class="round">
                                            <img src="{{asset("storage/avatar/products/".$item->avatar)}}" alt="" width="100%">
                                        </span>
                                    </td>
                                    <td>
                                        <h6>
                                            <a href="{{route('my.local.product.show',[$id,$item->id])}}" class="link">{{$item->name}}</a>
                                        </h6>
                                        <small class="text-muted">Producto id : {{$item->id}} </small>
                                    </td>
                                    <td>
                                        {{-- <h5>{{$item->amount}}</h5> --}}
                                    </td>
                                    <td>
                                        <h5>${{$item->price}}</h5>
                                    </td>
                                    <td>
                                        <h5><span class="badge badge-pill {{($item->status == 1) ? 'badge-cyan' : (($item->status == 0) ? 'badge-primary' : 'badge-danger')}}">{{($item->status == 1) ? 'Publicado' : (($item->status == 0) ? 'Oculto' : 'Borrador')}}</span></h5>
                                    </td>
                                    <td>
                                        <a href="{{route('my.local.product.edit',[$id,$item->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        {{-- <a href="{{route('my.local.product.delete',[$id,$item->id])}}" class="btn btn-sm btn-primary btn-delete"></a> --}}
                                        <button id="idItem-{{$item->id}}" class="btn btn-sm btn-primary delete-modal" ><i class="fa fa-trash"></i></button>
                                   </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="product-img">
                    <img src="/eliteadmin/assets/images/users/7.jpg">
                    <div class="pro-img-overlay"><a href="javascript:void(0)" class="bg-info"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="bg-danger"><i class="ti-trash"></i></a></div>
                </div>
                <div class="product-text">
                    <span class="pro-price bg-primary">$1.315.000</span>
                    <span class="pro-off-price bg-primary"><s>$100.050.000</s></span>
                    <h5 class="card-title m-b-0">Rounded Chair</h5>
                    <small class="text-muted db">globe type chair for rest</small>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('js')
    <script>
        $('#btn-delete').click(function () {
            $('#form-delete').submit();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.delete-modal').click(function () {
            let id = this.id.split('-')[this.id.split('-').length - 1];
            Swal.fire({
                title: '¿Está seguro?',
                text: "¡Si elimina el producto no prodrás revertirlo!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    $('#idItem-'+id).parent().parent().remove();
                    var jqxhr = $.post('/my/locals/'+{{$id}}+'/product/'+id, function name(data) {
                        console.log(data);
                        Swal.fire(
                            'Eliminado!',
                            'El producto ha sido eliminado',
                            'success'
                        )
                    })
                    .fail(function() {
                        alert( "error" );
                    });
                }
            })
        });
    </script>
@endsection

{{-- @section('css')
    <style>
        .ecomm-donute svg text {
            font-family: "Poppins", sans-serif !important;
            font-weight: 200 !important; 
        }
        .product-img {
            text-align: center;
            position: relative; 
        }
        .product-img img {
            max-width: 200px; 
        }
        .product-img .pro-img-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            display: none;
            background: rgba(255, 255, 255, 0.8); 
        }
        .product-img .pro-img-overlay a {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 40px;
            width: 40px;
            display: inline-block;
            border-radius: 100%;
            -webkit-border-radius: 100%;
            -o-border-radius: 100%;
            text-align: center;
            padding: 11px 0;
            color: #fff;
            margin: 20% 5px; 
        }
        .product-img .pro-img-overlay a:hover {
            background: #343a40 !important; 
        }
        .product-img:hover .pro-img-overlay {
            display: block; 
        }

        .product-text {
            border-top: 1px solid #e9ecef;
            padding-top: 15px;
            position: relative; 
        }
        .product-text .pro-price {
            position: absolute;
            padding: 25px 0;
            max-height: 70px;
            max-width: 70px;
            width: auto;
            height: auto;
            color: #fff;
            text-align: center;
            border-radius: 100%;
            -webkit-border-radius: 100%;
            -o-border-radius: 100%;
            top: -30px;
            right: 0px;
        }

        .product-text .pro-off-price {
            position: absolute;
            padding: 25px 0;
            max-height: 70px;
            max-width: 70px;
            width: auto;
            height: auto;
            color: #fff;
            text-align: center;
            border-radius: 100%;
            -webkit-border-radius: 100%;
            -o-border-radius: 100%;
            top: -30px;
            right: 80px;
        }
    </style>
@endsection --}}