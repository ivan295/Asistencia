<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    @if(Auth::user()->sexo == "Masculino")
                    <img src="{{ asset('img/man.jpg')}}" class="img-circle" alt="User Image"/>
                    @elseif(Auth::user()->sexo == "Femenino")
                    <img src="{{ asset('img/woman.png')}}" class="img-circle" alt="User Image"/>
                    @elseif(Auth::user()->sexo == "")
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                    @endif
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
            
        @endif

        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        .search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">OPCIONES</li>
            
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <!-- <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li> -->
            <li><a href="{{ url('asistencia') }}"><i class='fa fa-clock-o'></i> <span>Registro de Asistencia</span></a></li>
            <li><a href="{{ url('report_index') }}"><i class='fa fa-file-pdf-o'></i> <span>Reporte de Asistencia</span></a></li>
            <!-- <li><a href="{{ url('funcionario') }}"><i class='fa fa-user'></i> <span>Datos de Funcionario</span></a></li> -->
            <li><a href="{{ url('estado_registro_view') }}"><i class='fa fa-pencil'></i> <span>Aprobación de Asistencia</span></a></li> 
            <li class="treeview">
                <a href="#"><i class='fa fa-cogs'></i> <span>Configuracion</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('edificio') }}"><i class='fa fa-institution'></i> <span>Crear Edificio</span></a></li>
                    <li><a href="{{ url('departamento') }}"><i class='fa fa-suitcase'></i> <span>Crear Departamento</span></a></li>
                    <li><a href="{{ url('type_users') }}"><i class='fa fa-users'></i> <span>Crear Tipo de Usuario</span></a></li>
                    <li><a href="{{ url('direccion_ip') }}"><i class='fa fa-desktop'></i> <span>Agregar IP</span></a></li>
                </ul>
            </li>
        </ul>
    </section>
    
</aside>
