@php
    function type_social($type)
    {
        if ($type == "Fecebook"){
            return "facebook-f"; //fab
        }
        if ($type == "Instagram"){
            return "instagram"; //fab
        }
        if ($type == "Whatsapp"){
            return "whatsapp"; //fab
        }
        if ($type == "Twiter"){
            return "twitter"; //fab
        }
        if ($type == "YouTube"){
            return "youtube"; //fab
        }
        if ($type == "LinkedIn"){
            return "linkedin-in"; //fab
        }
        if ($type == "Página Web"){
            return "search"; // fas
        }
        if ($type == "Otra"){
            return "link"; // fab
        }
        return "link"; // fab
    }
@endphp

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
                <li class="breadcrumb-item active">Ver</li>
            </ol>
        </div>
    </div>
</div>
@include('my.local.includes.info')
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