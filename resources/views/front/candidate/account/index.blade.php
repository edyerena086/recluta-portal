@extends('layouts.front.app')

{{-- Page Title --}}
@section('pageTitle', 'Iniciar sesión')

{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 offset-md-1">
				<form action="{{ url('candidate') }}" method="POST" class="static-form">
					@csrf

					<h3>
						Inicia tu sesión
					</h3>
					<h5>
						*Todos los campos son obligatorios.
					</h5>

					@if($errors->count() > 0)
						<div class="alert alert-danger">
							¡Combinación de correo electrónico y contarseña incorrecta!
						</div>
					@endif 

					<div class="form-group">
						<label for="">
							Correo electrónico:
						</label>
						<input type="email" name="correoElectronico" class="form-control val-correoElectronico">
						<span class="span-correoElectronico"></span>
					</div>

					<div class="form-group">
						<label for="">
							Contraseña:
						</label>
						<input type="password" name="password" class="form-control val-password">
						<span class="span-password"></span>
					</div>

					<div class="form-group">
						<button class="btn btn-send">Iniciar sesión</button>
					</div>

					<ul>
						<li>
							<a href="">¿Olvidaste tu contraseña?</a>
						</li>

						<li>
							¿No tienes cuenta?, <a href="{{ url('candidate/account') }}">Registrate aquí</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
@stop