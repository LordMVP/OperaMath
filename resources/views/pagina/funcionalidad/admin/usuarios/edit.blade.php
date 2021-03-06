@extends('pagina.principal.principal')

@section('titulo', 'Editar Usuario')

@section('contenido')
		
		@if (Auth::user())
		<br><br>
<section id="contact">
<div class="container">
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-center text-uppercase text-secondary mb-0">Editar {{ Auth::user()->tipo }} - {!! $user->nombre . ' ' . $user->apellido!!}</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-8 mx-auto">

					{!! Form::open(['route' => ['admin.usuarios.update', $user], 'method' => 'PUT', 'files' => true]) !!}
					{!! Form::hidden('id2', $user->id2, ['class' => 'form-control', 'placeholder' => 'Numero De Cedula', 'required']) !!}
					
					<div class="form-group">
						{!! Form::label('cedula', 'Cedula') !!}
						{!! Form::text('id', $user->id, ['class' => 'form-control', 'placeholder' => 'Numero De Cedula', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('nombre', 'Nombre') !!}
						{!! Form::text('nombre', $user->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('apellido', 'Apellido') !!}
						{!! Form::text('apellido', $user->apellido, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('genero', 'Genero') !!}
						{!! Form::select('genero', ['masculino' => 'Masculino', 'femenino' => 'Femenino'], $user->genero, ['class' => 'form-control', 'required'], $user->genero) !!}
					</div>

					<div class="form-group">
						{!! Form::label('telefono', 'Telefono') !!}
						{!! Form::text('telefono', $user->telefono, ['class' => 'form-control', 'placeholder' => '325698785', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('email', 'Email') !!}
						{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('password', 'Contraseña') !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required']) !!}
					</div>
					@if(Auth::user()->tipo == "Estudiante")
					<div class="form-group">
						{!! Form::label('tipo', 'Nivel De Usuario') !!}
						{!! Form::select('tipo', ['Estudiante' => 'Estudiante'], $user->tipo, ['class' => 'form-control', 'required'], $user->tipo) !!}
					</div>
					@else
					<div class="form-group">
						{!! Form::label('tipo', 'Nivel De Usuario') !!}
						{!! Form::select('tipo', ['Administrador' => 'Administrador', 'Estudiante' => 'Estudiante'], $user->tipo, ['class' => 'form-control', 'required'], $user->tipo) !!}
					</div>
					@endif
					<div class="form-group">
						{!! Form::label('imagen', 'Imagen') !!}
						{!! Form::file('imagen', ['class' => '']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Modificar', ['class' => 'btn btn-default'])!!}
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
</section>
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