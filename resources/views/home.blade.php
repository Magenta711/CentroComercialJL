@extends('eliteadmin.layout')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Incio</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Inicio</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <!-- column -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">USUARIOS</h5>
                            <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                <span class="display-5 text-info"><i class="icon-people"></i></span>
                                <a href="javscript:void(0)" class="link display-5 ml-auto">23</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LOCALES DISPONIBLES</h5>
                            <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                <span class="display-5 text-purple"><i class="icon-folder"></i></span>
                                <a href="javscript:void(0)" class="link display-5 ml-auto">6</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">SALON DE EVENTOS</h5>
                            <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                <span class="display-5 text-primary"><i class="icon-folder-alt"></i></span>
                                <a href="javscript:void(0)" class="link display-5 ml-auto">311</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">TOTAL DE VISITAS</h5>
                            <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                <span class="display-5 text-success"><i class="icon-wallet"></i></span>
                                <a href="javscript:void(0)" class="link display-5 ml-auto">2117</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
            </div>
        </div>
        <div class="col-lg-6">
            <div class="news-slide m-b-15">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active carousel-item">
                            <div class="overlaybg"><img src="{{asset('img/pages/11.JPG')}}" class="img-fluid" /></div>
                            {{-- <div class="news-content carousel-caption"><span class="label label-danger label-rounded">Primary</span>
                                <h4>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4> <a href="javascript:void(0)">Read More</a></div> --}}
                        </div>
                        <div class="carousel-item">
                            <div class="overlaybg"><img src="{{asset('img/pages/22.JPG')}}" /></div>
                            {{-- <div class="news-content carousel-caption"><span class="label label-primary label-rounded">Primary</span>
                                <h4>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4> <a href="javascript:void(0)">Read More</a></div> --}}
                        </div>
                        <div class="carousel-item">
                            <div class="overlaybg"><img src="{{asset('img/pages/3.jpg')}}" /></div>
                            {{-- <div class="news-content carousel-caption"><span class="label label-success label-rounded">Primary</span>
                                <h4>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4> <a href="javascript:void(0)">Read More</a></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 m-b-30 text-center"> <small>Visitas del mes</small>
                            <h2><i class="ti-arrow-up text-success"></i> 1064</h2>
                            <div id="sparklinedash"></div>
                        </div>
                        <div class="col-lg-3 col-md-6 m-b-30 text-center"> <small>Total Page Views</small>
                            <h2><i class="ti-arrow-up text-purple"></i> 5064</h2>
                            <div id="sparklinedash2"></div>
                        </div>
                        <div class="col-lg-3 col-md-6 m-b-30 text-center"> <small>Unique Visitor</small>
                            <h2><i class="ti-arrow-up text-info"></i> 664</h2>
                            <div id="sparklinedash3"></div>
                        </div>
                        <div class="col-lg-3 col-md-6 m-b-30 text-center"> <small>Salón de eventos</small>
                            <h2><i class="ti-arrow-down text-danger"></i> 50%</h2>
                            <div id="sparklinedash4"></div>
                        </div>
                    </div>
                    <ul class="list-inline font-12 text-center">
                        <li><i class="fa fa-circle text-cyan"></i> Visitas</li>
                        <li><i class="fa fa-circle text-primary"></i> Salon de eventos</li>
                        <li><i class="fa fa-circle text-purple"></i> Locales disponibles</li>
                    </ul>
                    <div id="morris-area-chart" style="height: 340px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{asset('eliteadmin/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/morrisjs/morris.js')}}"></script>
    <script src="{{asset('eliteadmin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('eliteadmin/inverse/dist/js/dashboard3.js')}}"></script>
@endsection