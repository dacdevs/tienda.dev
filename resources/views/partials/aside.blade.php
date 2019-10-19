<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is("/") ? 'active' : ''  }}">
                        <a href="/"><i class="menu-icon fa fa-laptop"></i>Panel principal </a>
                    </li>
                    <li class="menu-title">Administración</li><!-- /.menu-title -->
                    <li class="{{ Request::is("clientes*") ? 'active' : ''  }}">
                        <a href="{{ route('clientes.index') }}" aria-haspopup="true"> <i class="menu-icon fa fa-cogs"></i>Clientes</a>
                    </li>
                    <li class="{{ Request::is("productos*") ? 'active' : ''  }}">
                        <a href="{{ route('productos.index') }}" aria-haspopup="true"> <i class="menu-icon fa fa-cogs"></i>Productos</a>
                    </li>
                    <li class="{{ Request::is("ventas*") ? 'active' : ''  }}">
                        <a href="{{ route('ventas.index') }}" aria-haspopup="true"> <i class="menu-icon fa fa-cogs"></i>Ventas</a>
                    </li>


                    <li class="menu-title">Reportes</li><!-- /.menu-title -->

                    <li class="{{ Request::is("reporte/venta*") ? 'active' : ''  }}">
                        <a href="{{ route('reportes.ventas') }}" aria-haspopup="true"> <i class="menu-icon fa fa-area-chart"></i> Ventas</a>
                    </li>

                    <li class="{{ Request::is("reporte/cliente*") ? 'active' : ''  }}">
                        <a href="{{ route('reportes.clientes') }}" aria-haspopup="true"> <i class="menu-icon fa fa-area-chart"></i> Clientes</a>
                    </li>

                    <li class="menu-title">Configuración</li><!-- /.menu-title -->

                    <li class="{{ Request::is("usuarios*") ? 'active' : ''  }}">
                        <a href="{{ route('usuarios.index') }}" aria-haspopup="true"> <i class="menu-icon fa fa-users"></i> Usuarios</a>
                    </li>




                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
