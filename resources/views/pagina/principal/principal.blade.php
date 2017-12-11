<!DOCTYPE html>
<html lang="es">
<head>
	
	<title> @yield('titulo', 'Default') | OperaMath </title>

	@include('pagina.principal.head')
	@yield('jss')

</head>

<body>
	
	<!-- Incliur el nav -->

	@include('pagina.principal.nav')
	
	<div class="text-center">
		@include('flash::message')
	</div>
	

	@yield('contenido')


	@include('pagina.principal.footer')

</body>

	    <!-- Bootstrap core JavaScript -->
	<script src="{{ asset('plugin/OperaMath/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('plugin/OperaMath/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Plugin JavaScript -->
	<script src="{{ asset('plugin/OperaMath/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('plugin/OperaMath/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

	<!-- Contact Form JavaScript -->
	<script src="{{ asset('plugin/OperaMath/js/jqBootstrapValidation.js') }}"></script>
	<script src="{{ asset('plugin/OperaMath/js/contact_me.js') }}"></script>

	<!-- Custom scripts for this template -->
	<script src="{{ asset('plugin/OperaMath/js/freelancer.min.js') }}"></script>

@yield('js')

</html>	
