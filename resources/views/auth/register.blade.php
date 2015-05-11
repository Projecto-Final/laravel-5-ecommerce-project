@extends('layouts.madre')

@section('registro_login')

<script type="text/javascript" src="{{ URL::asset('js/validaciones.js') }}"></script>

<div id="sns_content" class="wrap layout-m">
	<div class="container">
		<div class="row">
			<div id="sns_main" class="col-md-12 col-main">
				<div id="sns_mainmidle">
					<div class="account-create">
						<div class="page-title">
							<h1>Registrar nuevo usuario</h1>
						</div>
						<form role="form" method="POST" action="{{ url('/auth/register') }}" id="form-validate">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="fieldset">
								<input type="hidden" name="success_url" value="">
								<input type="hidden" name="error_url" value="">
								<h2 class="legend">Información Personal</h2>
								<ul class="form-list">
									@if (count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Whoops!</strong> There were some problems with your input.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif

									<li class="fields">
										<div class="customer-name">
											<div class="field name-firstname">
												<label for="nombre" class="required"><em>*</em>Nombre</label>
												<div class="input-box">
													<input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" title="Nombre" maxlength="255" class="input-text required-entry">
													<span class='error' id='nombre_error'>&nbsp;Campo obligatorio</span></td>
												</div>
											</div>
											<div class="field name-lastname">
												<label for="apellidos" class="required"><em>*</em>Apellidos</label>
												<div class="input-box">
													<input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" title="Apellido" maxlength="255" class="input-text required-entry">
													<span class='error' id='apellido_error'>&nbsp;Campo obligatorio</span></td>
												</div>
											</div>
										</div>
									</li>
									<li>
										<label for="apodo" class="required"><em>*</em>Apodo</label>
										<div class="input-box">
											<input type="text" id="username" class="input-text validate-email required-entry"  name="username" value="{{ old('username') }}">
											<span class='error' id='username_error'>&nbsp;Campo obligatorio</span></td>
										</div>
									</li>
									<li class="control">
										<div class="input-box">
											<input type="checkbox" name="politica_privacidad" title="Sign Up for Newsletter" value="1" id="politica_privacidad" class="checkbox">
										</div>
										<label for="politica_privacidad">Acepto las condiciones de uso y politica de privacidad.</label></td>
										<span class='error' id='politica_privacidad_error'>&nbsp;Debe aceptar las condiciones de uso y politica de privacidad</span></td>
									</li>
								</ul>
							</div>
							<div class="fieldset">
								<h2 class="legend">Información de Login</h2>
								<ul class="form-list">
									<li class="fields">
										<div class="field">
											<label for="confirmation" class="required"><em>*</em>Email</label>
											<div class="input-box">
												<input type="email" id="email_address" name="email" value="{{ old('email') }}" title="Correo Electronico" class="input-text validate-email required-entry"></br>
												<span class='error' id='email_address_error'>&nbsp;Campo obligatorio</span></td>
												<span class='error' id='email_address_error2'>&nbsp;Debe ser una direccion de correo valida</span></td>
											</div>
										</div>
									</li>
									<li class="fields">
										<div class="field">
											<label for="password" class="required"><em>*</em>Contraseña</label>
											<div class="input-box">
												<input type="password" name="password" id="password" title="password" class="input-text required-entry validate-password"></br>
												<span class='error' id='password_error'>&nbsp;Campo obligatorio</span></td>
												<span class='error' id='password_error2'>&nbsp;La contraseña debe se der de almenos 6 caracteres</span></td>
											</div>
										</div>
										<div class="field">
											<label for="confirmacion" class="required"><em>*</em>Confirmar Contraseña</label>
											<div class="input-box">
												<input type="password" id="password_confirmation" name="password_confirmation" title="Confirm Password" class="input-text required-entry validate-cpassword"></br>
												<span class='error' id='password_confirmation_error2'>&nbsp;Las contraseñas deben coincidir</span>
												<span class='error' id='password_confirmation_error'>&nbsp;Campo obligatorio</span></td>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="buttons-set">
								<p class="required">* Campos requeridos</p>
								<p class="back-link"><a href="index.html" class="back-link">« Regresar al inicio</a></p>

								<!-- <button type="submit" title="Submit" class="button" onclick='formValidatorr()'><span><span>Registrar</span></span></button> -->
								
								<input type='button' title="Submit" class="button" onclick='formValidator()' value="Registrar"><span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
