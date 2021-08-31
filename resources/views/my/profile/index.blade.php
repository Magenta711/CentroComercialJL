@extends('eliteadmin.layout')

@section('content')

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Administración de cuenta</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Perfil</li>
            </ol>
            {{-- <a href="{{route('locals.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Crear</a> --}}
        </div>
    </div>
</div>

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> 
                    {{-- <img src="{{asset('eliteadmin/assets/images/users/2.jpg')}}" class="img-circle" width="150" /> --}}
                    @if (auth()->user()->avatar)
                        <img src="{{asset('/storage/avatar/users/'.auth()->user()->avatar)}}" alt="user-img" class="img-circle" width="150">
                    @else
                        <div class="text-center">
                            <span class="round" style="width:150px;height: 150px; font-size: 50pt; font-weight: 550; padding: 50px;">{{str_split(auth()->user()->name)[0]}}</span>
                        </div>
                    @endif
                    <h4 class="card-title m-t-10">{{auth()->user()->name}}</h4>
                    <h6 class="card-subtitle">
                        @foreach (auth()->user()->getRoleNames() as $role)
                            <span class="badge badge-pill badge-primary text-white ml-auto">
                                {{$role}}
                            </span>
                        @endforeach
                    </h6>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-other"></i> <font class="font-medium">254</font></a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-local"></i> <font class="font-medium">54</font></a></div>
                    </div>
                </center>
            </div>
            <div>
            <hr>
            </div>
            <div class="card-body"> <small class="text-muted">Correo electrónico</small>
                <h6>{{auth()->user()->email}}</h6> <small class="text-muted p-t-30 db">Teléfono</small>
                <h6>{{auth()->user()->tel}}</h6> <small class="text-muted p-t-30 db">Dirrección</small>
                <h6>{{auth()->user()->address}}</h6>
                {{-- <div class="map-box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> --}} 
                {{-- <small class="text-muted p-t-30 db">Perfil social</small>
                <br/>
                <a href="" class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></a>
                <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Perfil</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Configuración</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!--second tab-->
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nombre</strong>
                                <br>
                                <p class="text-muted">{{auth()->user()->name}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Teléfono</strong>
                                <br>
                                <p class="text-muted">{{auth()->user()->tel}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Correo electrónico</strong>
                                <br>
                                <p class="text-muted">{{auth()->user()->email}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Dirrección</strong>
                                <br>
                                <p class="text-muted">{{auth()->user()->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <div class="card-body">
                        <form action="{{route('my.profile.update')}}" class="form-horizontal form-material" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="dropify" accept="image/*" {!! auth()->user()->avatar ? 'data-default-file="/storage/avatar/users/'.auth()->user()->avatar.'"' : '' !!} />
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nombre</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" placeholder="{{auth()->user()->name}}" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Correo electrónico</label>
                                <div class="col-md-12">
                                    <input type="email" name="email" placeholder="{{auth()->user()->email}}" class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Número de teléfono</label>
                                <div class="col-md-12">
                                    <input type="text" name="tel" placeholder="{{auth()->user()->tel}}" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Dirrección</label>
                                <div class="col-md-12">
                                    <input type="text" name="address" placeholder="{{auth()->user()->address}}" class="form-control form-control-line">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-md-12" for="current_password">Contraseña actual</label>
                                <div class="col-md-12">
                                    <input type="password" name="current_password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="password">Contraseña</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12" for="password_confirmation">Confirmar contraseña</label>
                                <div class="col-md-12">
                                    <input type="password" name="password_confirmation" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Actuzalizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('eliteadmin/assets/node_modules/dropify/dist/css/dropify.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('eliteadmin/assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify({
                messages: {
                    default: 'arrastre y suelte un archivo aquí o haga clic',
                    replace: 'Arrastra y suelta o haz clic para reemplazar ',
                    remove: 'Eliminar',
                    error: 'Vaya, se agregó algo incorrecto.'
                }
            });

            $('#btn_add_social_media').click(function () {
                $('#origen_social_media').clone().appendTo('#destino_social_media');
            });
    
            // Used events
            var drEvent = $('#input-file-events').dropify();
    
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
    
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
    
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
    
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>        
@endsection