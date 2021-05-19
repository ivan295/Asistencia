@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Editar Edificio
@endsection
@section('main-content')
<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="container-fluid spark-screen">
            <div class="box box-success">
                <div class="box-header with-border">
				    <h3 class="box-title"><i class="fa fa-user"></i> Editar Edificio</h3>
			    </div>
                <form method="post"  action="type_users_update/{{$tipo->id}}">
                {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="col-md-12">
                            <label for="new_pass">Nombre</label>
                            <div class="input-group">
           	                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
           	                    <input type="text" class="form-control" name="tipouser" id="tipouser" value="<?php echo $tipo->descripcion?>" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection