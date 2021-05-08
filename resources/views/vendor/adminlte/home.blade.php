@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Inicio
@endsection
@section('main-content')
@include('adminlte::alerts.exito')
	<br>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 ">

				<!-- Default box -->
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"></h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<h2 class="titulo-carousel">SERVICIOS INSTITUCIONALES</h2>
						<!-- {{ trans('adminlte_lang::message.logged') }}. Start creating your amazing application! -->
						<div class="customer-logos">
						<div class="slide"><a href="{{ url('asistencia') }}"><img src="{{asset('img/registro2.png')}}"></a></div>
  							<div class="slide"><a href="https://mail.junin.gob.ec/" target="_blank"><img src="{{asset('img/correozimbra.png')}}"></a></div>
  							<div class="slide"><a href="https://nube.junin.gob.ec/index.php/login" target="_blank"><img src="{{asset('img/cloud2.png')}}"></a></div>
  							<div class="slide"><a href="https://catastro.junin.gob.ec/" target="_blank"><img src="{{asset('img/catastro2.png')}}"></a></div>
							  <div class="slide"><a href="https://www.junin.gob.ec/" target="_blank"><img src="{{asset('img/web.png')}}"></a></div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
	<script src="{{ asset('/js/carousel.js') }}" defer></script>
@endsection
