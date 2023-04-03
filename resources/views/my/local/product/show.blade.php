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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Administración de mis locales</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="">{{$item->name}}</h3>
                <h6 class="card-subtitle"><span class="badge badge-pill {{($item->status == 1) ? 'badge-cyan' : (($item->status == 0) ? 'badge-primary' : 'badge-danger')}}">{{($item->status == 1) ? 'Publicado' : (($item->status == 0) ? 'Oculto' : 'Borrador')}}</span></h6>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="white-box text-center"> <img src="/storage/avatar/products/{{$item->avatar}}" class="img-responsive"> </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-6">
                        <h4 class="box-title m-t-40">Descriptción del producto</h4>
                        <p>{{$item->description}}</p>
                        <h2 class="m-t-40">${{$item->price}} {{-- <small class="text-success">(36% off)</small> --}} </h2>
                        {{-- <button class="btn btn-dark btn-rounded m-r-5" data-bs-toggle="tooltip" title="" data-original-title="Add to cart"><i class="ti-shopping-cart"></i> </button>
                        <button class="btn btn-primary btn-rounded"> Buy Now </button> --}}
                        {{-- <h3 class="box-title m-t-40">Key Highlights</h3> --}}
                        {{-- <ul class="list-unstyled">
                            <li>Disponible {{$item->amount}} unidades</li> --}}
                            {{-- <li><i class="fa fa-check text-success"></i> Sturdy structure</li>
                            <li><i class="fa fa-check text-success"></i> Designed to foster easy portability</li>
                            <li><i class="fa fa-check text-success"></i> Perfect furniture to flaunt your wonderful collectibles</li> --}}
                        {{-- </ul> --}}
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title m-t-40">Información general</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($item->items as $it)
                                        <tr id="origen_item">
                                            <td>
                                                <p>{{$it->item}}</p>
                                            </td>
                                            <td>
                                                <p>{{$it->description}}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($item->files)
                        <div class="col-md-12">
                            <label for="file">Galeria</label>
                            <div class="card-columns el-element-overlay">
                                @foreach ($item->files as $it)
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1">
                                                <a class="image-popup-vertical-fit" href="{{$it->url.$it->name}}"> <img src="{{$it->url.$it->name}}" alt="{{$it->name}}" /> </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>


@endsection


@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('eliteadmin/inverse/dist/css/pages/user-card.css')}}" rel="stylesheet">
@endsection

@section('js')
<script src="{{asset('eliteadmin/assets/node_modules/magnific-popup/dist/jquery.magnific-popup.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.el-card-avatar').magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>
@endsection