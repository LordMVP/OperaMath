<!DOCTYPE html>
<html lang="es">
<head>
	
	<title> Inicio | OperaMath </title>

	@include('pagina.principal.head')

</head>

<body>
	
		@include('pagina.principal.nav')
	
	<!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-1 d-block mx-auto" style="width: 30%; border-radius: 75px;" src="{{ asset('plugin/OperaMath/img/portfolio/math.png') }}" alt="">
        <h3 class="text-uppercase mb-0">OperaMath</h3>
        <hr class="star-light">
        <h4 class="font-weight-light mb-0">Software para el aprendizaje</h4>
        <h5 class="font-weight-light mb-0">Sumas - Restas - Multiplicación - División</h5>
      </div>
    </header>
<!-- Portfolio Grid Section -->
    <section class="Videos" id="Videos">
      <div class="container">
        <h3 class="text-center text-uppercase text-secondary mb-0">Videos</h3>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-1">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('plugin/OperaMath/img/portfolio/sumar.png') }}" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-2">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('plugin/OperaMath/img/portfolio/restar.jpg') }}" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-3">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('plugin/OperaMath/img/portfolio/multiplicar.gif') }}" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-4">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{ asset('plugin/OperaMath/img/portfolio/division.gif') }}" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

<!-- Portfolio Modals -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h3 class="text-secondary text-uppercase mb-0">Sumas</h3>
              <hr class="star-dark mb-5">
              	<video width="100%" height="80%" controls>
				  	<source src="{{ asset('plugin/OperaMath/img/portfolio/vidsuma.mp4') }}" type="video/mp4">
				</video>
              <p class="mb-5"></p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Cerrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-2">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h3 class="text-secondary text-uppercase mb-0">Restas</h3>
              <hr class="star-dark mb-5">
              	<video width="100%" height="80%" controls>
				  	<source src="{{ asset('plugin/OperaMath/img/portfolio/vidresta.mp4') }}" type="video/mp4">
				</video>
              <p class="mb-5"></p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Cerrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-3">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h3 class="text-secondary text-uppercase mb-0">Multiplicacion</h3>
              <hr class="star-dark mb-5">
              	<video width="100%" height="80%" controls>
				  	<source src="{{ asset('plugin/OperaMath/img/portfolio/vidmultiplicacion.mp4') }}" type="video/mp4">
				</video>
              <p class="mb-5"></p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Cerrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-4">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h3 class="text-secondary text-uppercase mb-0">División</h3>
              <hr class="star-dark mb-5">
              	<video width="100%" height="80%" controls>
				  	<source src="{{ asset('plugin/OperaMath/img/portfolio/viddivision.mp4') }}" type="video/mp4">
				</video>
              <p class="mb-5"></p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Cerrar</a>
            </div>
          </div>
        </div>
      </div>
    </div>


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

	@include('pagina.principal.footer')
			

	</body>
</html>	