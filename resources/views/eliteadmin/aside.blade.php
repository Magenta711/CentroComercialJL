<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div>
                    <img src="{{asset('eliteadmin/assets/images/users/2.jpg')}}" alt="user-img" class="img-circle">
                </div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Esteban Leal
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu animated flipInY">
                        <a href="javascript:void(0)" class="dropdown-item">
                            <i class="ti-user"></i> Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item">
                            <i class="ti-settings"></i> Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"href="{{ route('logout') }}"
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
                <li class="nav-small-cap">--- Administración</li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-grid2"></i>
                        <span class="hide-menu">
                            Página
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="index4.html">Carrusel</a>
                        </li>
                        <li>
                            <a href="{{route('admin_about')}}">Nosotros </a>
                        </li>
                        <li>
                            <a href="index2.html">Barbosa</a>
                        </li>
                        <li>
                            <a href="index3.html">Cualidades</a>
                        </li>
                        <li>
                            <a href="index3.html">Tiendas</a>
                        </li>
                        <li>
                            <a href="index3.html">Servicios</a>
                        </li>
                        <li>
                            <a href="index3.html">Contáctanos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="fa fa-store-alt"></i>
                        <span class="hide-menu">Locales</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="fa fa-calendar-alt"></i>
                        <span class="hide-menu">Salón de eventos</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="hide-menu">Administración de usuarios</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{route('users')}}">Usuarios</a>
                        </li>
                        <li>
                            <a href="index2.html">Usuarios eliminados</a>
                        </li>
                        <li>
                            <a href="index3.html">Roles</a>
                        </li>
                    </ul>
                </li>
            </li>
            </ul>
        </nav>
    </div>
</aside>