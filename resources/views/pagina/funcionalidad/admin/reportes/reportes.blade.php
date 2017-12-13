@extends('pagina.principal.principal')

@section('titulo', 'Usuarios')

@section('js')

<script type="text/javascript">
    function doSearch() {
                var tableReg = document.getElementById('regTable');
                var searchText = document.getElementById('searchTerm').value.toLowerCase();
                for (var i = 1; i < tableReg.rows.length; i++) {
                    var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                    var found = false;
                    for (var j = 0; j < cellsOfRow.length && !found; j++) {
                        var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                        if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                            found = true;
                        }
                    }
                    if (found) {
                        tableReg.rows[i].style.display = '';
                    } else {
                        tableReg.rows[i].style.display = 'none';
                    }
                }
            }
</script>

@endsection

@section('contenido')
<br>
    <br>
        @if (Auth::user()) 
        
        <section id="contact">
            <div class="container">
                <h3 class="text-center text-uppercase text-secondary mb-0">
                    Reportes
                </h3>
                <hr class="star-dark mb-5">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div id="accordion" role="tablist">
                    {!! Form::open(['route' => 'pagina.login', 'method' => 'POST']) !!}
                                <div class="card">
                                    <div class="card-header" id="headingOne" role="tab">
                                        <h5 class="mb-0">
                                            <a aria-controls="collapseOne" aria-expanded="true" data-toggle="collapse" href="#collapseOne">
                                                Reporte General
                                            </a>
                                        </h5>
                                    </div>
                                    
                                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
									<div class="col-lg-4">
	                                    <div class="control-group">
							                <div class="form-group floating-label-form-group controls mb-0 pb-2">
									                  <input id="searchTerm" class="form-control" type="text" onkeyup="doSearch()" placeholder="Busqueda..." />
						                	</div>
						              	</div>
					              	</div>

                                    <div aria-labelledby="headingOne" class="collapse show" data-parent="#accordion" id="collapseOne" role="tabpanel">
                                        <div class="card-body">
                                            	<table class="table" id="regTable">
												  <thead class="thead-dark">
												    <tr>
												      <th scope="col">Documento</th>
												      <th scope="col">Nombre</th>
												      <th scope="col">Ejercicio</th>
												      <th scope="col">Cantidad de Ejercicios</th>
												      <th scope="col">Correctos</th>
												      <th scope="col">Fallidos</th>
												      <th scope="col">Promedio</th>
												    </tr>
												  </thead>
												  <tbody>
														@foreach ($lreporte as $reporte)
														<tr>
													      <th scope="row">{{ $reporte->documento }}</th>
													      <td>{{ $reporte->nombre }}</td>
													      <td>{{ $reporte->tipo }}</td>
													      <td>{{ $reporte->cantidad }}</td>
													      <td>{{ $reporte->correctas }}</td>
													      <td>{{ $reporte->incorrectas }}</td>
													      <td>{{ $reporte->promedio }}</td>
													    </tr>
														@endforeach
												  </tbody>
												</table>												
                                          	</div>                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
            </div>
        </section>
        @else
        <div class="blog">
            <div class="container">
                <div class="blog-text">
                    <h1>
                        401
                    </h1>
                    <p>
                        OPPS No tiene Los Permisos Para Acceder A esta Pagina
                    </p>
                    <a href="/">
                        Regresar
                    </a>
                    <span>
                    </span>
                </div>
            </div>
        </div>
        @endif
    </br>
</br>
@endsection





	@section('js')
<script src="{{ asset('plugin/funcionalidad/bower_components/jquery/dist/jquery.min.js') }}">
</script>
<script src="{{ asset('plugin/funcionalidad/bower_components/bootstrap/dist/js/bootstrap.min.js') }}">
</script>
<script src="{{ asset('plugin/funcionalidad/bower_components/metisMenu/dist/metisMenu.min.js') }}">
</script>
<!-- Morris Charts JavaScript -->
<script src="{{ asset('plugin/funcionalidad/bower_components/raphael/raphael-min.js') }}">
</script>
<script src="{{ asset('plugin/funcionalidad/bower_components/morrisjs/morris.min.js') }}">
</script>
<script src="{{ asset('plugin/funcionalidad/js/morris-data.js') }}">
</script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('plugin/funcionalidad/dist/js/sb-admin-2.js') }}">
</script>
@endsection
