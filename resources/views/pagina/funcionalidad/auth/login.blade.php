@extends('pagina.principal.principal')

@section('titulo', 'Login')


@section('contenido')

@include('pagina.principal.nav')

  <br>
<section id="contact">
      <div class="container">
        <h3 class="text-center text-uppercase text-secondary mb-0">Ingresar</h3>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            {!! Form::open(['route' => 'pagina.login', 'method' => 'POST']) !!}
				{!! csrf_field() !!}
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  {!! Form::label('email', 'Email') !!}
                  {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required', 'data-validation-required-message'=>'Por favor ingrese su email.']) !!}
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  {!! Form::label('Contraseña', 'Contraseña') !!}
                  {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => '**********', 'required', 'data-validation-required-message'=>'Por favor ingrese su contraseña.', 'style' => '']) !!}
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
              		{!! Form::submit('Login', ['class' => 'btn btn-primary btn-xl']) !!}
              </div>
   			{!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>

{!! Form::close() !!}

@endsection

