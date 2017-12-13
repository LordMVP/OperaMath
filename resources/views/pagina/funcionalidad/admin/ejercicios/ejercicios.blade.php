@extends('pagina.principal.principal')

@section('titulo', 'Usuarios')

@section('js')

<script type="text/javascript">
    var datos;
    var variables;

    function limpiar(cual, accion){
		var f = document.formulario
		for (var i=0; i<f.elements.length; i++){
			var obj = f.elements[i]
			var name = obj.name
			if (name==cual){
				obj.checked = ((accion==1)? true : ((accion==0)? false : !obj.checked) );
			}
		}
	}

    function evaluar(accion){
    	
    	var datos;
    	var res1 = $('input:radio[name='+accion+'1]:checked').val();
    	//$('#sum1').attr('checked',false);
    	var res2 = $('input:radio[name='+accion+'2]:checked').val();
    	var res3 = $('input:radio[name='+accion+'3]:checked').val();
    	var res4 = $('input:radio[name='+accion+'4]:checked').val();
    	var res5 = $('input:radio[name='+accion+'5]:checked').val();
    	var respuesta = "";
    	var comparacion = "";
    	var user_id = $('#id').val();
    	var ejer_id = "";

    	if(res1 == null || res2 == null || res3 == null || res4 == null || res5 == null){
    		alert("Faltan respuestas por seleccionar");
    	}else{

    		var txt;
			var r = confirm("Seguro desea Continuar?");
			if (r == true) {
			    for(var i = 1; i <= 5; i++){
	    			respuesta = $('input:radio[name='+accion+i+']:checked').val().trim();
	    			comparacion = $('#'+accion+i+'_res').val().trim();
	    			//alert(respuesta + " -- " + comparacion);
	    			//if($('input:radio[name='+accion+i+']:checked').val() === $('#'+accion+i+'_res')){   				
					if(respuesta.toString() == comparacion.toString()){
	    				$('#vejer_'+accion+i).show();
	    				$('#fejer_'+accion+i).hide();
	    				$('#ejer_sol_'+accion+i).show();
	    			}else{
	    				$('#vejer_'+accion+i).hide();
	    				$('#fejer_'+accion+i).show();
	    				$('#ejer_sol_'+accion+i).show();
	    			}

	    			ejer_id = $('#'+accion+'_ejer'+i+'_id').val();
	    			$.ajax({
			                type: "GET",
			                url: "almacenar_respuesta/"+user_id+"/"+ejer_id+"/"+respuesta,
			      			async:false,
			                success: function(data) { 
			        		//datos = eval(data);
			        		//location.reload();
			        		$('#btn_evaluar_'+accion).hide();
			        		$('#btn_recargar_'+accion).show();
			                }
			         });
	    		}
			}
    	}
    	//alert($('input:radio[name=sum1]:checked').val());
    }
/*
          $.ajax({
                type: "GET",
                url: "estadistica_datos/"+id1+"/"+id2+"/"+id3,
      async:false,
                success: function(data) { 
        datos = eval(data);
                }
          });*/


</script>

@endsection

@section('contenido')
<br>
    <br>
        @if (Auth::user()) 
        
        <section id="contact">
            <div class="container">
                <h3 class="text-center text-uppercase text-secondary mb-0">
                    Ejercicios
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
                                                Suma
                                            </a>
                                        </h5>
                                    </div>
                                    
                                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                                    <div aria-labelledby="headingOne" class="collapse show" data-parent="#accordion" id="collapseOne" role="tabpanel">
                                        <div class="card-body">
                                            <nav class="nav nav-tabs" id="myTab" role="tablist">
                                            	<a aria-controls="nav-sum1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-sumprogreso" id="nav-home-tab" role="tab">
                                                    Progreso 
                                                </a>
                                                <a aria-controls="nav-sum1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-sum1" id="nav-home-tab" role="tab">
                                                    1
                                                </a>
                                                <a aria-controls="nav-sum2" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-sum2" id="nav-profile-tab" role="tab">
                                                    2
                                                </a>
                                                <a aria-controls="nav-sum3" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-sum3" id="nav-contact-tab" role="tab">
                                                    3
                                                </a>
                                                <a aria-controls="nav-sum4" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-sum4" id="nav-contact-tab" role="tab">
                                                    4
                                                </a>
                                                <a aria-controls="nav-sum5" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-sum5" id="nav-contact-tab" role="tab">
                                                    5
                                                </a>
                                                <a aria-controls="nav-sum1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-evaluar" id="nav-home-tab" role="tab">
                                                    Evaluar
                                                </a>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                            	<div aria-labelledby="nav-home-tab" class="tab-pane fade show active" id="nav-sumprogreso" role="tabpanel">
                                            	<table class="table">
												  <thead class="thead-dark">
												    <tr>
												      <th scope="col">Ejercicio</th>
												      <th scope="col">Cantidad de Ejercicios</th>
												      <th scope="col">Correctos</th>
												      <th scope="col">Fallidos</th>
												      <th scope="col">Promedio</th>
												    </tr>
												  </thead>
												  <tbody>
														@foreach ($lsuma as $suma)
														<tr>
													      <th scope="row">{{ $suma->ejercicio }}</th>
													      <td>{{ $suma->cantidad }}</td>
													      <td>{{ $suma->correctas }}</td>
													      <td>{{ $suma->incorrectas }}</td>
													      <td>{{ $suma->promedio }}</td>
													    </tr>
														@endforeach
												  </tbody>
												</table>												
                                          		</div>
                                            	<div aria-labelledby="nav-home-tab" class="tab-pane fade show" id="nav-evaluar" role="tabpanel">
                                            	<ul class="list-group">
												  	<li class="list-group-item">
														  	Ejercicio 1
														  	<span style="display: none;" id="ejer_sol_sum1">| Solucion correcta 3 | </span>
														  	<span style="display: none;" id="vejer_sum1" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_sum1" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 2
														  	<span style="display: none;" id="ejer_sol_sum2">| Solucion correcta 5 | </span>
														  	<span style="display: none;" id="vejer_sum2" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_sum2" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 3
														  	<span style="display: none;" id="ejer_sol_sum3">| Solucion correcta 4 | </span>
														  	<span style="display: none;" id="vejer_sum3" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_sum3" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 4
														  	<span style="display: none;" id="ejer_sol_sum4">| Solucion correcta 7 | </span>
														  	<span style="display: none;" id="vejer_sum4" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_sum4" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 5
														  	<span style="display: none;" id="ejer_sol_sum5">| Solucion correcta 6 | </span>
														  	<span style="display: none;" id="vejer_sum5" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_sum5" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item text-center" style="border: none;">
														  	{!! Form::button('Evaluar', ['class' => 'btn btn-primary', 'id' => 'btn_evaluar_sum', 'onclick' => 'evaluar("sum")']) !!}
														  	{!! Form::button('Recargar', ['class' => 'btn btn-primary', 'style' => 'display: none;', 'id' => 'btn_recargar_sum', 'onclick' => 'location.reload();']) !!}
												  	</li>
												</ul>
                                            	

                                            	</div>
                                                <div aria-labelledby="nav-home-tab" class="tab-pane fade show" id="nav-sum1" role="tabpanel">
	                                                <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/suma/ejercicio1.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="sum1_res" id="sum1_res" required="" value="3">
	                                                    				<input type="hidden" name="sum_ejer1_id" id="sum_ejer1_id" value="1">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="sum1" id="sum1" required="" value="1"> <h4>1</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum1" id="sum1" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="sum1" id="sum1" required="" value="5"> <h4>5</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum1" id="sum1" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-profile-tab" class="tab-pane fade" id="nav-sum2" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/suma/ejercicio2.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="sum2_res" id="sum2_res" required="" value="5">
	                                                    				<input type="hidden" name="sum_ejer2_id" id="sum_ejer2_id" value="2">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="sum2" id="sum2" required="" value="2"> <h4>2</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum2" id="sum2" required="" value="8"> <h4>8</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="sum2" id="sum2" required="" value="10"> <h4>10</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum2" id="sum2" required="" value="5"> <h4>5</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-sum3" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/suma/ejercicio3.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="sum3_res" id="sum3_res" required="" value="4">
	                                                    				<input type="hidden" name="sum_ejer3_id" id="sum_ejer3_id" value="3">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="sum3" id="sum3" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum3" id="sum3" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="sum3" id="sum3" required="" value="1"> <h4>11</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum3" id="sum3" required="" value="4"> <h4>4</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-sum4" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/suma/ejercicio4.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="sum4_res" id="sum4_res" required="" value="7">
	                                                    				<input type="hidden" name="sum_ejer4_id" id="sum_ejer4_id" value="4">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="sum4" id="sum4" required="" value="12"> <h4>12</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum4" id="sum4" required="" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="sum4" id="sum4" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum4" id="sum4" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-sum5" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/suma/ejercicio5.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="sum5_res" id="sum5_res" required="" value="6">
	                                                    				<input type="hidden" name="sum_ejer5_id" id="sum_ejer5_id" value="5">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="sum5" id="sum5" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum5" id="sum5" value="9"> <h4>9</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="sum5" id="sum5" value="12"> <h4>12</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="sum5" id="sum5" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}



                                <div class="card">
                                    <div class="card-header" id="headingTwo" role="tab">
                                        <h5 class="mb-0">
                                            <a aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseTwo">
                                                Resta
                                            </a>
                                        </h5>
                                    </div>
                                    <div aria-labelledby="headingTwo" class="collapse" data-parent="#accordion" id="collapseTwo" role="tabpanel">
                                        <div class="card-body">
                                            <nav class="nav nav-tabs" id="myTab" role="tablist">
                                            	<a aria-controls="nav-res1" aria-selected="true" class="nav-item nav-link active" data-toggle="tab" href="#nav-resprogreso" id="nav-home-tab" role="tab">
                                                    Progreso 
                                                </a>
                                                <a aria-controls="nav-res1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-res1" id="nav-home-tab" role="tab">
                                                    1
                                                </a>
                                                <a aria-controls="nav-res2" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-res2" id="nav-profile-tab" role="tab">
                                                    2
                                                </a>
                                                <a aria-controls="nav-res3" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-res3" id="nav-contact-tab" role="tab">
                                                    3
                                                </a>
                                                <a aria-controls="nav-res4" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-res4" id="nav-contact-tab" role="tab">
                                                    4
                                                </a>
                                                <a aria-controls="nav-res5" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-res5" id="nav-contact-tab" role="tab">
                                                    5
                                                </a>
                                                <a aria-controls="nav-res1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-evaluar-res" id="nav-home-tab" role="tab">
                                                    Evaluar
                                                </a>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                            	<div aria-labelledby="nav-home-tab" class="tab-pane fade show active" id="nav-resprogreso" role="tabpanel">
                                            	<table class="table">
												  <thead class="thead-dark">
												    <tr>
												      <th scope="col">Ejercicio</th>
												      <th scope="col">Cantidad de Ejercicios</th>
												      <th scope="col">Correctos</th>
												      <th scope="col">Fallidos</th>
												      <th scope="col">Promedio</th>
												    </tr>
												  </thead>
												  <tbody>
														@foreach ($lresta as $resta)
														<tr>
													      <th scope="row">{{ $resta->ejercicio }}</th>
													      <td>{{ $resta->cantidad }}</td>
													      <td>{{ $resta->correctas }}</td>
													      <td>{{ $resta->incorrectas }}</td>
													      <td>{{ $resta->promedio }}</td>
													    </tr>
														@endforeach
												  </tbody>
												</table>												
                                          		</div>
                                            	<div aria-labelledby="nav-home-tab" class="tab-pane fade show" id="nav-evaluar-res" role="tabpanel">
                                            	<ul class="list-group">
												  	<li class="list-group-item">
														  	Ejercicio 1
														  	<span style="display: none;" id="ejer_sol_res1">| Solucion correcta 1 | </span>
														  	<span style="display: none;" id="vejer_res1" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_res1" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 2
														  	<span style="display: none;" id="ejer_sol_res2">| Solucion correcta 2 | </span>
														  	<span style="display: none;" id="vejer_res2" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_res2" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 3
														  	<span style="display: none;" id="ejer_sol_res3">| Solucion correcta 3 | </span>
														  	<span style="display: none;" id="vejer_res3" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_res3" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 4
														  	<span style="display: none;" id="ejer_sol_res4">| Solucion correcta 3 | </span>
														  	<span style="display: none;" id="vejer_res4" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_res4" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 5
														  	<span style="display: none;" id="ejer_sol_res5">| Solucion correcta 9 | </span>
														  	<span style="display: none;" id="vejer_res5" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_res5" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item text-center" style="border: none;">
														  	{!! Form::button('Evaluar', ['class' => 'btn btn-primary', 'id' => 'btn_evaluar_res', 'onclick' => 'evaluar("res")']) !!}
														  	{!! Form::button('Recargar', ['class' => 'btn btn-primary', 'style' => 'display: none;', 'id' => 'btn_recargar_res', 'onclick' => 'location.reload();']) !!}
												  	</li>
												</ul>
                                            	

                                            	</div>
                                                <div aria-labelledby="nav-home-tab" class="tab-pane fade show" id="nav-res1" role="tabpanel">
	                                                <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/resta/ejercicio1.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="res1_res" id="res1_res" required="" value="1">
	                                                    				<input type="hidden" name="res_ejer1_id" id="res_ejer1_id" value="6">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="res1" id="res1" required="" value="9"> <h4>9</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res1" id="res1" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="res1" id="res1" required="" value="1"> <h4>1</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res1" id="res1" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-profile-tab" class="tab-pane fade" id="nav-res2" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/resta/ejercicio2.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="res2_res" id="res2_res" required="" value="2">
	                                                    				<input type="hidden" name="res_ejer2_id" id="res_ejer2_id" value="7">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="res2" id="res2" required="" value="2"> <h4>2</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res2" id="res2" required="" value="8"> <h4>8</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="res2" id="res2" required="" value="10"> <h4>10</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res2" id="res2" required="" value="5"> <h4>5</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-res3" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/resta/ejercicio3.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="res3_res" id="res3_res" required="" value="3">
	                                                    				<input type="hidden" name="res_ejer3_id" id="res_ejer3_id" value="8">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="res3" id="res3" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res3" id="res3" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="res3" id="res3" required="" value="1"> <h4>11</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res3" id="res3" required="" value="4"> <h4>4</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-res4" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/resta/ejercicio4.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="res4_res" id="res4_res" required="" value="3">
	                                                    				<input type="hidden" name="res_ejer4_id" id="res_ejer4_id" value="9">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="res4" id="res4" required="" value="12"> <h4>12</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res4" id="res4" required="" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="res4" id="res4" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res4" id="res4" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-res5" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/resta/ejercicio5.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="res5_res" id="res5_res" required="" value="9">
	                                                    				<input type="hidden" name="res_ejer5_id" id="res_ejer5_id" value="10">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="res5" id="res5" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res5" id="res5" value="9"> <h4>9</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="res5" id="res5" value="12"> <h4>12</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="res5" id="res5" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header" id="headingThree" role="tab">
                                        <h5 class="mb-0">
                                            <a aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseThree">
                                                Multiplicacion
                                            </a>
                                        </h5>
                                    </div>
                                    <div aria-labelledby="headingThree" class="collapse" data-parent="#accordion" id="collapseThree" role="tabpanel">
                                        <div class="card-body">
                                            <nav class="nav nav-tabs" id="myTab" role="tablist">
                                            	<a aria-controls="nav-multi1" aria-selected="true" class="nav-item nav-link active" data-toggle="tab" href="#nav-multiprogreso" id="nav-home-tab" role="tab">
                                                    Progreso 
                                                </a>
                                                <a aria-controls="nav-multi1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-multi1" id="nav-home-tab" role="tab">
                                                    1
                                                </a>
                                                <a aria-controls="nav-multi2" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-multi2" id="nav-profile-tab" role="tab">
                                                    2
                                                </a>
                                                <a aria-controls="nav-multi3" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-multi3" id="nav-contact-tab" role="tab">
                                                    3
                                                </a>
                                                <a aria-controls="nav-multi4" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-multi4" id="nav-contact-tab" role="tab">
                                                    4
                                                </a>
                                                <a aria-controls="nav-multi5" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-multi5" id="nav-contact-tab" role="tab">
                                                    5
                                                </a>
                                                <a aria-controls="nav-multi1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-evaluar-multi" id="nav-home-tab" role="tab">
                                                    Evaluar
                                                </a>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                            	<div aria-labelledby="nav-home-tab" class="tab-pane fade show active" id="nav-multiprogreso" role="tabpanel">
                                            	<table class="table">
												  <thead class="thead-dark">
												    <tr>
												      <th scope="col">Ejercicio</th>
												      <th scope="col">Cantidad de Ejercicios</th>
												      <th scope="col">Correctos</th>
												      <th scope="col">Fallidos</th>
												      <th scope="col">Promedio</th>
												    </tr>
												  </thead>
												  <tbody>
														@foreach ($lmulti as $multi)
														<tr>
													      <th scope="row">{{ $multi->ejercicio }}</th>
													      <td>{{ $multi->cantidad }}</td>
													      <td>{{ $multi->correctas }}</td>
													      <td>{{ $multi->incorrectas }}</td>
													      <td>{{ $multi->promedio }}</td>
													    </tr>
														@endforeach
												  </tbody>
												</table>												
                                          		</div>
                                            	<div aria-labelledby="nav-home-tab" class="tab-pane fade show" id="nav-evaluar-multi" role="tabpanel">
                                            	<ul class="list-group">
												  	<li class="list-group-item">
														  	Ejercicio 1
														  	<span style="display: none;" id="ejer_sol_multi1">| Solucion correcta 6 | </span>
														  	<span style="display: none;" id="vejer_multi1" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_multi1" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 2
														  	<span style="display: none;" id="ejer_sol_multi2">| Solucion correcta 6 | </span>
														  	<span style="display: none;" id="vejer_multi2" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_multi2" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 3
														  	<span style="display: none;" id="ejer_sol_multi3">| Solucion correcta 8 | </span>
														  	<span style="display: none;" id="vejer_multi3" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_multi3" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 4
														  	<span style="display: none;" id="ejer_sol_multi4">| Solucion correcta 8 | </span>
														  	<span style="display: none;" id="vejer_multi4" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_multi4" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 5
														  	<span style="display: none;" id="ejer_sol_multi5">| Solucion correcta 12 | </span>
														  	<span style="display: none;" id="vejer_multi5" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_multi5" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item text-center" style="border: none;">
														  	{!! Form::button('Evaluar', ['class' => 'btn btn-primary', 'id' => 'btn_evaluar_multi', 'onclick' => 'evaluar("multi")']) !!}
														  	{!! Form::button('Recargar', ['class' => 'btn btn-primary', 'style' => 'display: none;', 'id' => 'btn_recargar_multi', 'onclick' => 'location.reload();']) !!}
												  	</li>
												</ul>
                                            	

                                            	</div>
                                                <div aria-labelledby="nav-home-tab" class="tab-pane fade show" id="nav-multi1" role="tabpanel">
	                                                <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/multiplicacion/ejercicio1.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="multi1_res" id="multi1_res" required="" value="6">
	                                                    				<input type="hidden" name="multi_ejer1_id" id="multi_ejer1_id" value="11">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="multi1" id="multi1" required="" value="16"> <h4>16</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi1" id="multi1" required="" value="26"> <h4>26</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="multi1" id="multi1" required="" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi1" id="multi1" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-profile-tab" class="tab-pane fade" id="nav-multi2" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/multiplicacion/ejercicio2.png') }}" class="img-fluid" alt="multiponsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="multi2_res" id="multi2_res" required="" value="6">
	                                                    				<input type="hidden" name="multi_ejer2_id" id="multi_ejer2_id" value="12">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="multi2" id="multi2" required="" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi2" id="multi2" required="" value="9"> <h4>9</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="multi2" id="multi2" required="" value="16"> <h4>16</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi2" id="multi2" required="" value="2"> <h4>2</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-multi3" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/multiplicacion/ejercicio3.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="multi3_res" id="multi3_res" required="" value="8">
	                                                    				<input type="hidden" name="multi_ejer3_id" id="multi_ejer3_id" value="13">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="multi3" id="multi3" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi3" id="multi3" required="" value="8"> <h4>8</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="multi3" id="multi3" required="" value="1"> <h4>11</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi3" id="multi3" required="" value="4"> <h4>4</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-multi4" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/multiplicacion/ejercicio4.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="multi4_res" id="multi4_res" required="" value="10">
	                                                    				<input type="hidden" name="multi_ejer4_id" id="multi_ejer4_id" value="14">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="multi4" id="multi4" required="" value="12"> <h4>12</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi4" id="multi4" required="" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="multi4" id="multi4" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi4" id="multi4" required="" value="10"> <h4>10</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-multi5" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/multiplicacion/ejercicio5.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="multi5_res" id="multi5_res" required="" value="12">
	                                                    				<input type="hidden" name="multi_ejer5_id" id="multi_ejer5_id" value="15">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="multi5" id="multi5" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi5" id="multi5" value="9"> <h4>9</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="multi5" id="multi5" value="12"> <h4>12</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="multi5" id="multi5" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card">
                                    <div class="card-header" id="headingFour" role="tab">
                                        <h5 class="mb-0">
                                            <a aria-controls="collapseFour" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseFour">
                                                Division
                                            </a>
                                        </h5>
                                    </div>
                                    <div aria-labelledby="headingFour" class="collapse" data-parent="#accordion" id="collapseFour" role="tabpanel">
                                        <div class="card-body">
                                            <nav class="nav nav-tabs" id="myTab" role="tablist">
                                            	<a aria-controls="nav-divi1" aria-selected="true" class="nav-item nav-link active" data-toggle="tab" href="#nav-diviprogreso" id="nav-home-tab" role="tab">
                                                    Progreso 
                                                </a>
                                                <a aria-controls="nav-divi1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-divi1" id="nav-home-tab" role="tab">
                                                    1
                                                </a>
                                                <a aria-controls="nav-divi2" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-divi2" id="nav-profile-tab" role="tab">
                                                    2
                                                </a>
                                                <a aria-controls="nav-divi3" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-divi3" id="nav-contact-tab" role="tab">
                                                    3
                                                </a>
                                                <a aria-controls="nav-divi4" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-divi4" id="nav-contact-tab" role="tab">
                                                    4
                                                </a>
                                                <a aria-controls="nav-divi5" aria-selected="false" class="nav-item nav-link" data-toggle="tab" href="#nav-divi5" id="nav-contact-tab" role="tab">
                                                    5
                                                </a>
                                                <a aria-controls="nav-divi1" aria-selected="true" class="nav-item nav-link" data-toggle="tab" href="#nav-evaluar-divi" id="nav-home-tab" role="tab">
                                                    Evaluar
                                                </a>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                            	<div aria-labelledby="nav-home-tab" class="tab-pane fade show active" id="nav-diviprogreso" role="tabpanel">
                                            	<table class="table">
												  <thead class="thead-dark">
												    <tr>
												      <th scope="col">Ejercicio</th>
												      <th scope="col">Cantidad de Ejercicios</th>
												      <th scope="col">Correctos</th>
												      <th scope="col">Fallidos</th>
												      <th scope="col">Promedio</th>
												    </tr>
												  </thead>
												  <tbody>
														@foreach ($ldivi as $divi)
														<tr>
													      <th scope="row">{{ $divi->ejercicio }}</th>
													      <td>{{ $divi->cantidad }}</td>
													      <td>{{ $divi->correctas }}</td>
													      <td>{{ $divi->incorrectas }}</td>
													      <td>{{ $divi->promedio }}</td>
													    </tr>
														@endforeach
												  </tbody>
												</table>												
                                          		</div>
                                            	<div aria-labelledby="nav-home-tab" class="tab-pane fade show" id="nav-evaluar-divi" role="tabpanel">
                                            	<ul class="list-group">
												  	<li class="list-group-item">
														  	Ejercicio 1
														  	<span style="display: none;" id="ejer_sol_divi1">| Solucion correcta 3 | </span>
														  	<span style="display: none;" id="vejer_divi1" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_divi1" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 2
														  	<span style="display: none;" id="ejer_sol_divi2">| Solucion correcta 4 | </span>
														  	<span style="display: none;" id="vejer_divi2" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_divi2" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 3
														  	<span style="display: none;" id="ejer_sol_divi3">| Solucion correcta 5 | </span>
														  	<span style="display: none;" id="vejer_divi3" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_divi3" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 4
														  	<span style="display: none;" id="ejer_sol_divi4">| Solucion correcta 5 | </span>
														  	<span style="display: none;" id="vejer_divi4" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_divi4" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item">
														  	Ejercicio 5
														  	<span style="display: none;" id="ejer_sol_divi5">| Solucion correcta 3 | </span>
														  	<span style="display: none;" id="vejer_divi5" class="badge badge-pill badge-success">Correcto</span>
														  	<span style="display: none;" id="fejer_divi5" class="badge badge-pill badge-danger">Incorrecto</span>
												  	</li>
												  	<li class="list-group-item text-center" style="border: none;">
														  	{!! Form::button('Evaluar', ['class' => 'btn btn-primary', 'id' => 'btn_evaluar_divi', 'onclick' => 'evaluar("divi")']) !!}
														  	{!! Form::button('Recargar', ['class' => 'btn btn-primary', 'style' => 'display: none;', 'id' => 'btn_recargar_divi', 'onclick' => 'location.reload();']) !!}
												  	</li>
												</ul>
                                            	

                                            	</div>
                                                <div aria-labelledby="nav-home-tab" class="tab-pane fade show" id="nav-divi1" role="tabpanel">
	                                                <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/division/ejercicio1.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="divi1_res" id="divi1_res" required="" value="3">
	                                                    				<input type="hidden" name="divi_ejer1_id" id="divi_ejer1_id" value="16">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="divi1" id="divi1" required="" value="12"> <h4>12</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi1" id="divi1" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="divi1" id="divi1" required="" value="8"> <h4>8</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi1" id="divi1" required="" value="1"> <h4>1</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-profile-tab" class="tab-pane fade" id="nav-divi2" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/division/ejercicio2.png') }}" class="img-fluid" alt="diviponsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="divi2_res" id="divi2_res" required="" value="4">
	                                                    				<input type="hidden" name="divi_ejer2_id" id="divi_ejer2_id" value="17">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="divi2" id="divi2" required="" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi2" id="divi2" required="" value="9"> <h4>9</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="divi2" id="divi2" required="" value="15"> <h4>15</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi2" id="divi2" required="" value="4"> <h4>4</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-divi3" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/division/ejercicio3.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="divi3_res" id="divi3_res" required="" value="5">
	                                                    				<input type="hidden" name="divi_ejer3_id" id="divi_ejer3_id" value="18">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="divi3" id="divi3" required="" value="5"> <h4>5</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi3" id="divi3" required="" value="18"> <h4>18</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="divi3" id="divi3" required="" value="11"> <h4>11</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi3" id="divi3" required="" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-divi4" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/division/ejercicio4.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="divi4_res" id="divi4_res" required="" value="5">
	                                                    				<input type="hidden" name="divi_ejer4_id" id="divi_ejer4_id" value="19">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="divi4" id="divi4" required="" value="5"> <h4>5</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi4" id="divi4" required="" value="12"> <h4>12</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="divi4" id="divi4" required="" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi4" id="divi4" required="" value="2"> <h4>2</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div aria-labelledby="nav-contact-tab" class="tab-pane fade" id="nav-divi5" role="tabpanel">
                                                    <div class="row" >
	                                                    <div class="col-lg-8">
	                                                    	<img style="width: 90%" src="{{ asset('plugin/OperaMath/img/division/ejercicio5.png') }}" class="img-fluid" alt="Responsive image">
	                                                    </div>
	                                                    <div class="col-lg-3" style="margin: 10px">
	                                                    <div class="alert alert-success" role="alert">
															  <h4 class="alert-heading">Seleccione!</h4><hr>
															  <table style="margin: 20px; width: 100%">
	                                                    			<tr><input type="hidden" name="divi5_res" id="divi5_res" required="" value="3">
	                                                    				<input type="hidden" name="divi_ejer5_id" id="divi_ejer5_id" value="20">
	                                                    				<th>	                                                    					
	                                                    					<input type="radio" name="divi5" id="divi5" value="6"> <h4>6</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi5" id="divi5" value="9"> <h4>9</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    			<tr>
	                                                    				<th>
	                                                    					<input type="radio" name="divi5" id="divi5" value="3"> <h4>3</h4>
	                                                    				</th>
	                                                    				<th>
	                                                    					<input type="radio" name="divi5" id="divi5" value="7"> <h4>7</h4>
	                                                    				</th>
	                                                    			</tr>
	                                                    	</table>
														</div>
	                                                    	
	                                                    </div>
	                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </hr>
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
