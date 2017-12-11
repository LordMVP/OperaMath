@extends('pagina.principal.principal')

@section('titulo', 'Registrar Usuarios')

@section('contenido')

<div class="funcionalidad">

	<div id="wrapper">

		@include('pagina.funcionalidad.nav')
		
		@if (Auth::user())

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Registro Medico</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-10 col-md-6">

					{!! Form::open(['route' => 'admin.medicos.store', 'method' => 'POST', 'files' => true]) !!}

					<div class="form-group">
						{!! Form::label('cedula', 'Cedula') !!}
						{!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Numero De Cedula', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('nombre', 'Nombre') !!}
						{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('apellido', 'Apellido') !!}
						{!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('genero', 'Genero') !!}
						{!! Form::select('genero', ['masculino' => 'Masculino', 'femenino' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Genero', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('direccion', 'Direccion') !!}
						{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Cra 8 No 20 - 10', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('telefono', 'Telefono') !!}
						{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '325698785', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('email', 'Email') !!}
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('password', 'Contraseña') !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required']) !!}
					</div>
					
					<div class="form-group">
						<input type="hidden" id="tipo" name="tipo" value="medico">
					</div>
					
					<div class="form-group">
						{!! Form::label('especialidad', 'Especialidad') !!}
						{!! Form::select('especialidad[]', $especialidad, null, ['class' => 'form-control', 'multiple', 'required', 'id' => 'especialidad']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('imagen', 'Imagen') !!}
						{!! Form::file('imagen', ['class' => '']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
						{!! Form::reset('Limpiar', ['class' => 'btn btn-default'])!!}
					</div>

					{!! Form::close() !!}

					<br><br>
					<hr>
				</div>
			</div>	


			@else

			<div class="blog">
				<div class="container">
					<div class="blog-text">
						<h1>401</h1>
						<p>OPPS No tiene Los Permisos Para Acceder A esta Pagina</p> 
						<a href="/" >Regresar</a>
						<span> </span>
					</div>
				</div>
			</div>

			@endif

		</div>
	</div>
</div>

@endsection


@section('js')

<script type="text/javascript">

	$("#especialidad").chosen({
		placeholder_text_multiple: "Seleccione Maximo 2 Especialidades",
		max_selected_options: 2,
		search_contains: true,
		no_results_text: 'No Se Encontraron Resultados'
	});
</script>

@endsection