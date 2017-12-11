@extends('pagina.principal.principal')

@section('titulo', 'Funciones')


@section('contenido')

<div class="contact">
	<div class="container">
		<div class="work-title">
			<h3>CONTACTENOS<span></span></h3>
		</div>
		<div class="contact-infom">
			<h4>Informacion :</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sheets containing Lorem Ipsum passages, 
				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.It was popularised in the 1960s with the release of Letraset
				and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
			<div class="address">
				<div class="col-md-4 address-grids">
					<h4>ADDRESS :</h4>
					<ul>
						<li class="home"> </li>
						<li><p>Cra 11b No 20 20<br>
							Nuevo Balmoral<br>
							Fusagasuga, Colombia</p>
						</li>
					</ul>
				</div>
				<div class="col-md-4 address-grids">
					<h4>CONTACT NO :</h4>
					<p><span class="phn"></span>+57 3143009784</p>
					<p><span class="fax"></span>+57 3205268958</p>
				</div>
				<div class="col-md-4 address-grids">
					<h4>EMAIL :</h4>
					<p><span class="mail"></span><a href="mailto:example@mail.com">rapihealth@gmail.com</a></p>
				</div>
				<div class="clearfix"> </div>
			</div>		
			<div class="contact-form">
				<h4>Formulario De Contacto</h4>
				
				{!! Form::open(['route' => 'contactanos.enviar', 'method' => 'POST']) !!}

				<div class="form-group">
					
					{!! Form::text('nombre', null, ['class' => '', 'placeholder' => 'Nombre Completo', 'required']) !!}
					{!! Form::text('email', null, ['class' => '', 'placeholder' => 'Email', 'required']) !!}
					{!! Form::text('telefono', null, ['class' => '', 'placeholder' => 'Telefono	', 'required']) !!}
					{!! Form::textarea('contenido', null, ['class' => 'textarea-contenido', 'required', 'id' => 'contenido']) !!}
					{!! Form::submit('Contacto', ['class' => 'btn btn-default btn-lg']) !!}

				</div>

				{!! Form::close() !!}

			</div>	
		</div>
		<div class="container">
			<div class="work-title">
				<h3>Preguntas Frecuentes</h3>
			</div>
			<div class="contact-infom">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Tema</th>
							<th>Solucion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="15%">Como Obtengo Un Usuario</td>
							<td width="15%">Nuevos Usuarios</td>
							<td width="70%">Solicitando el usuario al administrador por medio de contactenos y verificando los documentos requeridos por la empresa</td>
						</tr>
						<tr>
							<td width="15%">Como Recuperar Mi Contraseña</td>
							<td width="15%">Recuperacion de Usuarios y/o contraseña</td>
							<td width="70%">Solicitando la actualizacion al administrador por medio de contactenos.</td>
						</tr>
						<tr>
							<td width="15%">Como Solicito Una cita</td>
							<td width="15%">Citas</td>
							<td width="70%">acceder al panel de citas, en este se procede a seleccionar la especialidad de la cita y el medico disponible, luego se asigna fecha y hora de la cita para de ultimas realizar la confirmacion</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="container">
			<div class="work-title">
				<h3>Nuestra Ubicacion<span>Fusagasuga	</span></h3>
			</div>
		</div>
		<div class="map">	
			<iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d3978.4159495177673!2d-74.37044902121113!3d4.332735070924726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d4.332828699999999!2d-74.36860659999999!5e0!3m2!1ses!2ses!4v1451444345866" frameborder="0" style="border:0"></iframe>
		</div>
	</div>

	@endsection

	@section('js')
	

	<script type="text/javascript">
		
		$('#contenido').trumbowyg();

	</script>

	@endsection