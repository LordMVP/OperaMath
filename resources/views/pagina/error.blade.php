@extends('pagina.principal.principal')

@section('titulo', 'Acceso Denegado')

@section('contenido')

<br><br><br>
<section id="contact">
  	<div class="container">
        <h3 class="text-center text-uppercase text-secondary mb-0">Acceso Denegado</h3>
        <hr class="star-dark mb-5">
		<div id="page-wrapper">
			
			<div class="row">
				<div class="col-lg-8 mx-auto">
						<h1>401</h1>
						<p>OPPS No tiene Los Permisos Para Acceder A esta Pagina</p> 
						<a href="{{ route('index') }}" >Regresar</a>
						<span> </span>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

