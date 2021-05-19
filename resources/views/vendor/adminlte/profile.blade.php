@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Datos del Funcionario
@endsection
@section('main-content')
<br>
<!-- <div class="col-md-14"> -->
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="container-fluid spark-screen">
            <div class="box box-success">   
                <div class="box-body box-profile">
                    @foreach($perfil as $profile)
                        @if(Auth::user()->sexo == "Masculino")
                          <img src="{{ asset('img/man.jpg')}}" class="profile-user-img img-responsive img-circle" alt="User Image"/>
                        @elseif(Auth::user()->sexo == "Femenino")
                          <img src="{{ asset('img/woman.png')}}" class="profile-user-img img-responsive img-circle" alt="User Image"/>
                        @elseif(Auth::user()->sexo == "")
                          <img src="{{ Gravatar::get($user->email) }}" class="profile-user-img img-responsive img-circle" alt="User Image"/>
                        @endif   
                            <h3 class="profile-username text-center">{{$profile->name}}</h3>
                            <p class="profile-username text-center">{{$profile->apellido}}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                            <i class="fa fa-credit-card"></i>  <b>Cédula</b> <p class="pull-right">{{$profile->cedula}}</p>
                            </li>
                            <li class="list-group-item">
                            <i class="fa fa-map"></i>  <b>Dirección Domiciliaria</b> <p class="pull-right">{{$profile->direccion}}</p>
                            </li>
                            <li class="list-group-item">
                            <i class="fa fa-venus-mars"></i>  <b>Género</b> <p class="pull-right">{{$profile->sexo}}</p>
                            </li>
                            <li class="list-group-item">
                            <i class="fa fa-institution "></i>  <b>Edificio</b> <p class="pull-right">{{$profile->edificio}}</p>
                            </li>
                            <li class="list-group-item">
                            <i class="fa fa-suitcase"></i>  <b>Departamento</b> <p class="pull-right">{{$profile->departamento}}</p>
                            </li>
                            <li class="list-group-item">
                            <i class="fa fa-at"></i>  <b>Correo</b> <p class="pull-right">{{$profile->email}}</p>
                            </li>
                            <li class="list-group-item">
                            <i class="fa fa-key"></i>  <b>Contraseña  *************</b><button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#changepassword">Cambiar Contraseña</button>
                            </li>
                        </ul>
                  @endforeach
                    <a href="{{ url('/user_profile_edit')}}"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editProfile">Editar mis Datos</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid spark-screen">
	    <div class="col-md-6">
        <div class="box box-success">
        <img src="{{ asset('img/logogad.png')}}" height="250px" width="100%"/>
        </div>
      </div>
    </div>   
  </div> 
</div>-->
    <!-- ventana Modal -->
 <!--<div id="changepassword" class="modal fade"data-backdrop="static"> data-backdrop evita que la ventana modal se cierre al dar click fuera de ella -->
<form method="post"  action="/change_password">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="modal fade" id="changepassword" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title text-center">Cambiar Contraseña</h3>
      </div>
      <div class="modal-body">
        <div class="box-body">

          <div class="col-md-12">
            <label for="new_pass">Nueva Contraseña</label>
           <div class="input-group">
           	  <span class="input-group-addon"><i class="fa fa-key"></i></span>
           	  <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Escribir nueva contraseña" required>
            </div>
          </div>
          <div class="col-md-12">
            <label for="new_pass">Confirmar Contraseña</label>
           <div class="input-group">
           	  <span class="input-group-addon"><i class="fa fa-key"></i></span>
           	  <input type="password" class="form-control" name="equalspass" id="equalspass" placeholder="Vuelva a escribir la nueva contraseña" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Salir</button>
      </div>
    </div>
  </div>
</div>
</form>

@endsection

