@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Reporte de Registro
@endsection
@section('main-content')
<br></br>
<form method="post"  action="/report_search">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="box box-success">
            <div class="box-header with-border">
			    <h3 class="box-title"><i class="fa fa-file"></i> Generar Reporte de Asistencia</h3>
		    </div>
                <div class="box-body">
                    <label>Elegir fecha </label>
                    <div class="row">
                        <div class="col-md-6">
          				    <label for="nombre">Desde</label>
          				    <div class="input-group">
            				    <span class="input-group-addon"><i class="fa  fa-calendar"></i></span>
            				    <input type="date" class="form-control" name="desde" id="hasta" required>
          				    </div>
					    </div>   
                        <div class="col-md-6">
          				    <label for="nombre">Hasta</label>
          				    <div class="input-group">
            				    <span class="input-group-addon"><i class="fa  fa-calendar"></i></span>
            				    <input type="date" class="form-control" name="hasta" id="hasta" required>
          				    </div>
					    </div>                       
                    </div>
                    <br></br>
                    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-save"></span> Generar</button>
                </div>
        </div>
    </div>
</div>
</form>

@endsection