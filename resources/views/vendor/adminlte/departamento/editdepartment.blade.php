@extends('adminlte::layouts.app')
@section('htmlheader_title')
	Departamento
@endsection
@section('main-content')
<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="container-fluid spark-screen">
            <div class="box box-success">
                <div class="box-header with-border">
				    <h3 class="box-title"><i class="fa fa-user"></i> Editar Departamento</h3>
			    </div>
                @foreach($editdepart as $apart)
                <form method="post"  action="departamento_update/{{$apart->id}}">
                {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                    
                        <div class="col-md-12">
                            <label for="new_pass">Nombre</label>
                            <div class="input-group">
           	                    <span class="input-group-addon"><i class="fa fa-institution"></i></span>
           	                    <input type="text" class="form-control" name="departamento" id="departamento" value="<?php echo $apart->descripcion?>" required>
                            </div>
                            <label>Edificio</label>
                                <select class="form-control"  id="consult_edificio" onchange="consultar_edificio()">
                                    <option value="<?php echo $apart->edificio?>"><?php echo $apart->edificio?></option>
                                    <?php $build = DB::table('building')->get(); ?>
                                    @foreach($build as $building)
                                    <option value="<?php  echo $building->id ; ?>"> <?php echo $building->descripcion; ?> </option>
                                    @endforeach
                                </select>
                                    <input type="hidden" id="id_edificio" name="edificio">
				                @error('edificio')
      			                <small class="text-danger">{{$message}}</small>
      			                @enderror
                            <br>
                            <label for="new_pass">Dirección</label>
                            <small class="text-danger"> La información es opcional</small>
                            <div class="input-group">
           	                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
           	                        <textarea class="form-control" name="direccion" id="direccion" ><?php echo $apart->direccion?></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Editar</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection