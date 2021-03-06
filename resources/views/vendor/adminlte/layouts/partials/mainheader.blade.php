<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <img class="logo-mini" src="{{ asset('img/escudo.png')}}" width="45" height="45" alt="logo">
        <!-- <span class="logo-mini"><b>J</b>UNÍN</span> -->
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>GAD </b>JUNÍN</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                
                <!-- mensajes 
                <li class="dropdown messages-menu">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                     
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('adminlte_lang::message.tabmessages') }}</li>
                        <li>
                             inner menu: contains the messages 
                            <ul class="menu">
                                <li> 
                                    <a href="#">
                                        <div class="pull-left">
                                          
                                            <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                                        </div>
                                        
                                        <h4>
                                            {{ trans('adminlte_lang::message.supteam') }}
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                       
                                        <p>{{ trans('adminlte_lang::message.awesometheme') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">c</a></li>
                    </ul>
                </li> -->

                <!-- Notificaciones 
                <li class="dropdown notifications-menu">
                  
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('adminlte_lang::message.notifications') }}</li>
                        <li>
                         
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> {{ trans('adminlte_lang::message.newmembers') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">{{ trans('adminlte_lang::message.viewall') }}</a></li>
                    </ul>
                </li>-->


                <!-- tareas 
                <li class="dropdown tasks-menu">
                
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('adminlte_lang::message.tasks') }}</li>
                        <li>
                            
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        
                                        <h3>
                                            {{ trans('adminlte_lang::message.tasks') }}
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        
                                        <div class="progress xs">
                                            
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% {{ trans('adminlte_lang::message.complete') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">{{ trans('adminlte_lang::message.alltasks') }}</a>
                        </li>
                    </ul>
                </li> -->

                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu" id="user_menu" style="max-width: 280px;white-space: nowrap;">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="max-width: 280px;white-space: nowrap;overflow: hidden;overflow-text: ellipsis">
                            <!-- The user image in the navbar-->
                            <!-- <img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="User Image"/> -->
                                        @if(Auth::user()->sexo == "Masculino")
                                <img src="{{ asset('img/man.jpg')}}" class="user-image" alt="User Image"/>
                                @elseif(Auth::user()->sexo == "Femenino")
                                <img src="{{ asset('img/woman.png')}}" class="user-image" alt="User Image"/>
                                @elseif(Auth::user()->sexo == "")
                                <img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="User Image"/>
                                @endif
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(Auth::user()->sexo == "Masculino")
                                <img src="{{ asset('img/man.jpg')}}" class="img-circle" alt="User Image"/>
                                @elseif(Auth::user()->sexo == "Femenino")
                                <img src="{{ asset('img/woman.png')}}" class="img-circle" alt="User Image"/>
                                @elseif(Auth::user()->sexo == "")
                                <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image"/>
                                @endif                                <p>
                                    <span data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                                    <!-- <small>{{ trans('adminlte_lang::message.login') }} Nov. 2012</small> -->
                                </p>
                            </li>
                            <!-- Menu Body  -->
                            <!-- <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.followers') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.sales') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.friends') }}</a>
                                </div>
                            </li> -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left"> 
                                    <a href="{{ url('/user_profile')}}"><button type="button" class="btn btn-info">Mis datos</button></a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}"  id="logout"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <button type="button" class="btn btn-danger">Cerrar Sesión</button>
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
