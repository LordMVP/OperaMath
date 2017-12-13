@extends('pagina.principal.principal')

@section('titulo', 'Usuarios')

@section('contenido')
		
		@if (Auth::user())
<br><br>
<section id="contact">
	<div class="container">
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-center text-uppercase text-secondary mb-0">Listado Usuarios</h3>
				</div>
			</div>

			<div id="page-wrapper">
				<a href=" {{ route('admin.usuarios.create') }} " class="btn btn-info"> Registrar Usuario</a>
				<hr>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>Cedula</th>
												<th>Nombre</th>
												<th>Apellido</th>
												<th>Telefono</th>
												<th>Email</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($users as $user)
											<tr class="odd gradeX">
												<td>{{ $user->id }}</td>
												<td>{{ $user->nombre }}</td>
												<td>{{ $user->apellido }}</td>
												<td>{{ $user->telefono }}</td>
												<td>{{ $user->email }}</td>
												<td>
													<a href=" {{ route('admin.usuarios.edit', $user->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
													<a href=" {{ route('admin.usuarios.destroy', $user->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<div class="text-left">
									{!! $users->render() !!}
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-12 -->
				</div>
			</div>
		</div>
	</div>
</section>
			<!-- /.row -->

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