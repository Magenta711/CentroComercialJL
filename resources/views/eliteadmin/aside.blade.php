<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div>
                    @if (auth()->user()->avatar)
                        <img src="{{asset('/storage/avatar/users/'.auth()->user()->avatar)}}" alt="user-img" class="img-circle">
                    @else
                        <div class="text-center">
                            <span class="round">{{str_split(auth()->user()->name)[0]}}</span>
                        </div>
                    @endif
                </div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">{{strtoupper(auth()->user()->name)}}
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu animated flipInY">
                        <a href="{{route('my.profile')}}" class="dropdown-item">
                            <i class="ti-user"></i> Perfil
                        </a>
                        {{-- <div class="dropdown-divider"></div>
                        <a href="{{route('my.setting')}}" class="dropdown-item">
                            <i class="ti-settings"></i> Configuración</a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" >
                            <i class="fa fa-power-off"></i> {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{route('home')}}" aria-expanded="false">
                        <i class="fa fa-home"></i>
                        <span class="hide-menu">Inicio</span>
                    </a>
                </li>
                @if (auth()->user()->hasAnyPermission(['Lista de galeria de carrucel','Crear galeria de carrucel','Ver galeria de carrucel','Editar galeria de carrucel','Eliminar galeria de carrucel','Ver administración pagina nosotros','Editar contenido de pagina nosotros','Ver administración barbosa','Editar contenido de barbosa','Ver administración cualidades','Editar contenido de cualidades','Ver administración contactanos','Editar contenido de contactanos','Lista de administración de locales','Crear locales','Ver locales','Editar locales','Rentar locales','Eliminar locales','Lista de administración de eventos del salon','Crear eventos del salon','Ver eventos del salon','Editar eventos del salon','Eliminar eventos del salon','Lista de administración de espacios publicitarios','Crear espacios publicitarios','Ver espacios publicitarios','Editar espacios publicitarios','Rentar espacios publicitarios','Eliminar espacios publicitarios','Lista de usuarios eliminados','Crear usuarios eliminados','Ver usuarios eliminados','Editar usuarios eliminados','Lista de usuarios eliminados','Crear usuarios eliminados','Ver usuarios eliminados','Editar usuarios eliminados','Lista de administración de roles','Crear roles','Ver roles','Editar roles','Eliminar roles']))
                    <li class="nav-small-cap">--- Administración</li>
                @endif
                    @if (auth()->user()->hasAnyPermission(['Lista de galeria de carrucel','Crear galeria de carrucel','Ver galeria de carrucel','Editar galeria de carrucel','Eliminar galeria de carrucel','Ver administración pagina nosotros','Editar contenido de pagina nosotros','Ver administración barbosa','Editar contenido de barbosa','Ver administración cualidades','Editar contenido de cualidades','Ver administración contactanos','Editar contenido de contactanos']))
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-layout-grid2"></i>
                            <span class="hide-menu">
                                Página
                            </span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            @if (auth()->user()->hasAnyPermission(['Lista de galeria de carrucel','Crear galeria de carrucel','Ver galeria de carrucel','Editar galeria de carrucel','Eliminar galeria de carrucel']))
                                <li>
                                    <a href="{{route('admin_slider')}}">Carrusel</a>
                                </li>
                            @endif
                            @if (auth()->user()->hasAnyPermission(['Ver administración pagina nosotros','Editar contenido de pagina nosotros']))
                                <li>
                                    <a href="{{route('admin_about')}}">Nosotros </a>
                                </li>
                            @endif
                            @if (auth()->user()->hasAnyPermission(['Ver administración barbosa','Editar contenido de barbosa']))
                                <li>
                                    <a href="{{route('admin_barbosa')}}">Barbosa</a>
                                </li>
                            @endif
                            @if (auth()->user()->hasAnyPermission(['Ver administración cualidades','Editar contenido de cualidades']))
                                <li>
                                    <a href="{{route('admin_cualidades')}}">Cualidades</a>
                                </li>
                            @endif
                            {{-- @if (auth()->user()->hasAnyPermission(['Ver administración servicios','Editar contenido de servicios']))
                                <li>
                                    <a href="#">Servicios</a>
                                </li>
                            @endif
                            @if (auth()->user()->hasAnyPermission(['Ver administración contactanos','Editar contenido de contactanos']))
                                <li>
                                    <a href="#">Contáctanos</a>
                                </li>
                            @endif --}}
                        </ul>
                    </li>
                    @endif
                    @if (auth()->user()->hasAnyPermission(['Lista de mensajes de formularios','Ver mensajes de formularios','Dar aprobación a mensajes de formularios','Eliminar mensajes de formularios']))
                        <li>
                            <a class="waves-effect waves-dark" href="{{route('forms')}}" aria-expanded="false">
                                <i class="fa fa-calendar-alt"></i>
                                <span class="hide-menu">Formularios de contacto</span>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->hasAnyPermission(['Lista de administración de locales','Crear locales','Ver locales','Editar locales','Rentar locales','Eliminar locales','Lista de administración de eventos del salon','Crear eventos del salon','Ver eventos del salon','Editar eventos del salon','Eliminar eventos del salon','Lista de administración de espacios publicitarios','Crear espacios publicitarios','Ver espacios publicitarios','Editar espacios publicitarios','Rentar espacios publicitarios','Eliminar espacios publicitarios']))
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">Servicios</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                @if (auth()->user()->hasAnyPermission(['Lista de administración de locales','Crear locales','Ver locales','Editar locales','Rentar locales','Eliminar locales']))
                                    <li>
                                        <a href="{{route('locals')}}">Locales</a>
                                    </li>
                                @endif
                                @if (auth()->user()->hasAnyPermission(['Lista de administración de eventos del salon','Crear eventos del salon','Ver eventos del salon','Editar eventos del salon','Eliminar eventos del salon']))
                                    <li>
                                        <a href="{{route('admin.event_room')}}">Salón de eventos</a>
                                    </li>
                                @endif
                                @if (auth()->user()->hasAnyPermission(['Lista de administración de espacios publicitarios','Crear espacios publicitarios','Ver espacios publicitarios','Editar espacios publicitarios','Rentar espacios publicitarios','Eliminar espacios publicitarios']))
                                    <li>
                                        <a href="{{route('admin.publicity_place')}}">Espacios publicitarios</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if (auth()->user()->hasAnyPermission(['Lista de administración de renta','Ver renta','Editar renta','Dearrendar local','Eliminar renta']))
                        <li>
                            <a class="waves-effect waves-dark" href="{{route('admin_rents')}}" aria-expanded="false">
                                <i class="fa fa-store"></i>
                                <span class="hide-menu">Administración de rentas</span>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->hasAnyPermission(['Lista de usuarios eliminados','Crear usuarios eliminados','Ver usuarios eliminados','Editar usuarios eliminados','Lista de usuarios eliminados','Crear usuarios eliminados','Ver usuarios eliminados','Editar usuarios eliminados','Lista de administración de roles','Crear roles','Ver roles','Editar roles','Eliminar roles']))
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">Administración de usuarios</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                @if (auth()->user()->hasAnyPermission(['Lista de usuarios','Crear usuarios', 'Editar usuarios', 'Eliminar usuarios']))
                                    <li>
                                        <a href="{{route('users')}}">Usuarios</a>
                                    </li>
                                @endif
                                @if (auth()->user()->hasAnyPermission(['Lista de usuarios eliminados','Crear usuarios eliminados','Ver usuarios eliminados','Editar usuarios eliminados']))
                                    <li>
                                        <a href="#">Usuarios eliminados</a>
                                    </li>
                                @endif
                                @if (auth()->user()->hasAnyPermission(['Lista de administración de roles','Crear roles','Ver roles','Editar roles','Eliminar roles']))
                                    <li>
                                        <a href="{{route('roles')}}">Roles</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if (auth()->user()->hasAnyPermission(['Lista de mis locales','Ver mis locales','Editar mis locales']))
                        <li class="nav-small-cap">--- Principal</li>
                    @endif
                    @if (auth()->user()->hasAnyPermission(['Lista de mis locales','Ver mis locales','Editar mis locales']))
                        <li>
                            <a class="waves-effect waves-dark" href="{{route('my.local')}}" aria-expanded="false">
                                <i class="fa fa-store"></i>
                                <span class="hide-menu">Mis locales</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a class="waves-effect waves-dark" href="{{route('my_space')}}" aria-expanded="false">
                                <i class="fa fa-home"></i>
                                <span class="hide-menu">Espacios publicitarios</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{route('home')}}" aria-expanded="false">
                                <i class="fa fa-home"></i>
                                <span class="hide-menu">Galeria</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{route('home')}}" aria-expanded="false">
                                <i class="fa fa-home"></i>
                                <span class="hide-menu">Eventos</span>
                            </a>
                        </li> --}}
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</aside>
