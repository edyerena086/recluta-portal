@extends('layouts.front.app')

{{-- Content --}}
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 offset-md-1">
				<form action="" class="static-form">
					<h3>
						Crea tu cuenta con tu correo.
					</h3>
					<h5>
						*Todos los campos son obligatorios.
					</h5>

					<div class="form-group">
						<label for="">
							Nombre:
						</label>
						<input type="text" name="nombre" class="form-control">
					</div>

					<div class="form-group">
						<label for="">
							Apellido Paterno:
						</label>
						<input type="text" name="apellidoPaterno" class="form-control">
					</div>

					<div class="form-group">
						<label for="">
							Correo electrónico:
						</label>
						<input type="email" name="correoElectronico" class="form-control">
					</div>

					<div class="form-group">
						<label for="">
							Contraseña:
						</label>
						<input type="password" name="password" class="form-control">
					</div>

					<div class="form-group">
						<label for="">
							Confirmar contraseña:
						</label>
						<input type="password" name="password_confirmation" class="form-control">
					</div>

					<div class="form-group">
						<button class="btn btn-send">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop