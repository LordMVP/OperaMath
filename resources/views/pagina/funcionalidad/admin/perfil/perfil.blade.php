@extends('pagina.principal.principal')

@section('titulo', 'Perfil')

@section('jss')

@endsection

@section('contenido')

<br><br>
		@if (Auth::user())

			<section id="contact">
		      <div class="container">
		        <h3 class="text-center text-uppercase text-secondary mb-0">Informacion {{ Auth::user()->tipo }}</h3>
		        <hr class="star-dark mb-5">
		        <div class="row">
		          <div class="col-lg-8 mx-auto">

					<div class="col-12 mx-8">
						<a href="#" class="thumbnail">
							<img style="width: 25%; height: 25%;" src="{{ asset('plugin/imagenes/' . Auth::user()->imagen) }}" >	
						</a>
					</div>
					<div class="col-12 mx-8">
						<strong>Nombre</strong><br>
						<span id=""> {{ Auth::user()->nombre }} </span><br><br>
						<strong>Apellido</strong><br>
						<span id=""> {{ Auth::user()->apellido }} </span><br><br>
					</div>
					<div class="col-12 mx-8">
						<strong>Telefono</strong><br>
						<span id=""> {{ Auth::user()->telefono }} </span><br><br>
						<strong>Email</strong><br>
						<span id=""> {{ Auth::user()->email }} </span><br>
					</div>	

					<br>
					@if (Auth::user()->tipo == "medico")
					<a title="Editar" href=" {{ route('admin.medicos.edit', Auth::user()->id . '_1') }} " class="text-right glyphicon glyphicon-pencil btn btn-info">Editar</a>
					@else
					<a title="Editar" href=" {{ route('admin.usuarios.edit', Auth::user()->id . '_1') }} " class="text-right glyphicon glyphicon-pencil btn btn-info">Editar</a>
					@endif	

		          </div>
		        </div>
		      </div>
		    </section>

			@else

			<script type="text/javascript">
				window.location="{{ route('error.pagina') }}";
			</script>

			@endif

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