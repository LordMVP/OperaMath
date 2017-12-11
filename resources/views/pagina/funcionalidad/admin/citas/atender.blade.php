@extends('pagina.principal.principal')

@section('titulo', 'Atender')

@section('jss')

@endsection

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')

		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Cita Medica</h3>
				</div>
			</div>

			<div class="row">
				<div class="well">
					<h4 class="text-center">Informacion Paciente</h4>
					<div class="row">
						<div class="col-xs-5 col-md-2">
							<a href="#" class="thumbnail">
								
								<img src="{{ asset('plugin/imagenes/' . $cita->imagen_p) }}" >	
							</a>
						</div>
						<div class="col-xs-4 col-md-1">
							<strong>Nombre</strong><br><br>
							<strong>Apellido</strong><br><br>
							<strong>Direccion</strong>
						</div>
						<div class="col-xs-4 col-md-3">
							<span id=""> {{ $cita->nombre_p }} </span><br><br>
							<span id=""> {{ $cita->apellido_p }} </span><br><br>
							<span id=""> {{ $cita->direccion_p }} </span>
						</div>	
						<div class="col-xs-4 col-md-1">
							<strong>Telefono</strong><br><br>
							<strong>Email</strong><br>
						</div>	
						<div class="col-xs-5 col-md-3">
							<span id=""> {{ $cita->telefono_p }} </span><br><br>
							<span id=""> {{ $cita->email_p }} </span><br>
						</div>							
					</div>


				</div>
			</div>	
			<hr>	
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#home" data-toggle="tab">General</a></li>
						<li><a href="#antecedentes" data-toggle="tab">Antecedentes</a></li>
						<li><a href="#examen" data-toggle="tab">Examen</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="home">
							<div class="well">
								<form class="form-horizontal">
									<fieldset>
										<legend>Datos Generales Cita Medica</legend>
										<div class="form-group">
											<label for="textArea" class="col-lg-4 control-label">Motivo De la Consulta</label>
											<div class="col-lg-8">
												<textarea class="form-control" rows="3" id="textArea"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="textArea" class="col-lg-4 control-label">Antecedentes Enfermedad Actual</label>
											<div class="col-lg-8">
												<textarea class="form-control" rows="3" id="textArea"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="select" class="col-lg-2 control-label">Estado Cita</label>
											<div class="col-lg-10">
												<select class="form-control" id="select">
													<option>Atendida</option>
													<option>Aplazada</option>
												</select>
												<br>
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default">Cancel</button>
												<button type="submit" class="btn btn-primary">Concluir</button>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="antecedentes">
							<div class="well">
								<form class="form-horizontal">
									<fieldset>
										<legend>Antecedentes Heredofamiliares</legend>
										<div class="form-group">
											<label class="col-lg-2 control-label">DBT</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio">No</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">HTA</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio1">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio1">No</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">TBC</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio2">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio2">No</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Gemelar</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio3">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio3">No</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Otros</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio4">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio4">No</label>
													<label class="radio-inline">Cual?<input type="text" name="optradio"></label>
												</div>
											</div>
										</div>
										<legend>Antecedentes Personales</legend>
										<div class="form-group">
											<label class="col-lg-2 control-label">Alcohol</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="text" name="optradio"></label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Tabaco</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="text" name="optradio"></label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Drogas</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="text" name="optradio"></label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Infusiones</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="text" name="optradio"></label>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-lg-2 control-label">DBT</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio">No</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">HTA</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio1">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio1">No</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">TBC</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio2">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio2">No</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Gemelar</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio3">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio3">No</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Otros</label>
											<div class="col-lg-10">
												<div class="radio">
													<label class="radio-inline"><input type="radio" name="optradio4">Si</label>
													<label class="radio-inline"><input type="radio" name="optradio4">No</label>
													<label class="radio-inline">Cual?<input type="text" name="optradio"></label>
												</div>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="examen">
							<div class="well">
								<form class="form-horizontal">
									<fieldset>
										<legend>Examen Fisico</legend>
										<div class="form-group">
											<label for="textArea" class="col-lg-2 control-label">Impresion General</label>
											<div class="col-lg-10">
												<textarea class="form-control" rows="3" id="textArea"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="textArea" class="col-lg-2 control-label">Impresion General</label>
											<div class="col-lg-10">
												<label class="radio-inline">FC <input type="text" name="optradio"></label>
												<label class="radio-inline">TA <input type="text" name="optradio"></label>
												<label class="radio-inline">FR <input type="text" name="optradio"></label><br>
												<label class="radio-inline">PULSO <input type="text" name="optradio"></label>
												<label class="radio-inline">T° Axilar <input type="text" name="optradio"></label>
												<label class="radio-inline">T° Rectal <input type="text" name="optradio"></label>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			@else

			<script type="text/javascript">
				window.location="{{ route('error.pagina') }}";
			</script>

			@endif

		</div>
	</div>


	@endsection





	@section('js')

	<script src="{{ asset('plugin/funcionalidad/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('plugin/funcionalidad/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugin/funcionalidad/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

	<!-- Morris Charts JavaScript -->
	<script src="{{ asset('plugin/funcionalidad/bower_components/raphael/raphael-min.js') }}"></script>
	<script src="{{ asset('plugin/funcionalidad/bower_components/morrisjs/morris.min.js') }}"></script>
	<script src="{{ asset('plugin/funcionalidad/js/morris-data.js') }}"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{ asset('plugin/funcionalidad/dist/js/sb-admin-2.js') }}"></script>

	@endsection