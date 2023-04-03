@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de rentas</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Administración de mis locales</li>
            </ol>
        </div>
    </div>
</div>
<div class="row el-element-overlay">
    <div class="col-sm-12">
        <h4 class="card-title">Rentas</h4>
        <h6 class="card-subtitle">Lista de rentas</h6>
    </div>
    @foreach ($locals as $item)
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"> <img src="{{asset("storage/avatar/locals/".$item->avatar)}}" alt="user" />
                        <div class="el-overlay">
                            <ul class="el-info">
                                <li>
                                    <a href="{{route('my.local.show',$item->id)}}" class="btn default btn-outline image-popup-vertical-fit">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('my.local.edit',$item->id)}}" class="btn default btn-outline image-popup-vertical-fit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('my.local.product',$item->id)}}" class="btn default btn-outline image-popup-vertical-fit">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Local {{$item->local->code}}</h3>
                        <span class="badge badge-pill {{$item->local->is_page ? 'badge-cyan' : 'badge-primary'}}">{{$item->local->is_page ? 'Visible' : 'Invisible'}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('css')
    <link href="{{asset('eliteadmin/inverse/dist/css/pages/user-card.css')}}" rel="stylesheet">
@endsection