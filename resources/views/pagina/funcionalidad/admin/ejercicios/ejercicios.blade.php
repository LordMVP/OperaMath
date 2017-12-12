@extends('pagina.principal.principal')

@section('titulo', 'Usuarios')

@section('contenido')

		@include('pagina.funcionalidad.nav')
		
		@if (Auth::user())

		<section id="contact">
	      	<div class="container">
		        <h3 class="text-center text-uppercase text-secondary mb-0">Ejercicios</h3>
		        	<hr class="star-dark mb-5">
		        <div class="row">
		          	<div class="col-lg-8 mx-auto">
		          		<div id="accordion" role="tablist">
							  <div class="card">
							    <div class="card-header" role="tab" id="headingOne">
							      <h5 class="mb-0">
							        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							          Collapsible Group Item #1
							        </a>
							      </h5>
							    </div>

							    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
							      <div class="card-body">
							        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							      </div>
							    </div>
							  </div>
							  <div class="card">
							    <div class="card-header" role="tab" id="headingTwo">
							      <h5 class="mb-0">
							        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							          Collapsible Group Item #2
							        </a>
							      </h5>
							    </div>
							    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							      <div class="card-body">
							        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							      </div>
							    </div>
							  </div>
							  <div class="card">
							    <div class="card-header" role="tab" id="headingThree">
							      <h5 class="mb-0">
							        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							          Collapsible Group Item #3
							        </a>
							      </h5>
							    </div>
							    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
							      <div class="card-body">
							        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							      </div>
							    </div>
							  </div>
							</div>
		          		</div>
	          	</div>
          	</div>
      	</section>/

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