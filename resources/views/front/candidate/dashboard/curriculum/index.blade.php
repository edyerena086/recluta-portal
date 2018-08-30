@extends('layouts.front.candidate.dashboard')

{{-- Page Title --}}
@section('pageTitle', 'Mi Curriculum')

{{-- Body Page Title --}}
@section('bodyPageTitle', 'Mi Curriculum')

{{-- Content --}}
@section('content')
	<div class="row">
		<div class="col-lg-4"></div>

		<div class="col-lg-8">
			<div class="content">
				{{-- Form 1 --}}
				<div class="panel panel-white">
					<div class="panel-heading">
						<h6 class="panel-title">Datos generales</h6>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
							</ul>
						</div>
					</div>

					<form id="generalInfo" class="form-basic ui-formwizard" action="{{ url('candidate/dashboard/curriculum/'.$user->id.'/edit') }}">
						<fieldset class="step" id="step1">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">1</span>
								Información personal
							</h6>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">
											Primer nombre:
										</label>
										<input type="text" name="primerNombre" class="form-control" value="{{ ucwords($user->name) }}">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="">
											Segundo nombre:
										</label>
										<input type="text" name="segundoNombre" class="form-control" value="{{ ucwords($user->candidate->second_name) }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">
											Apellido paterno:
										</label>
										<input type="text" name="apellidoPaterno" class="form-control" value="{{ ucwords($user->candidate->last_name) }}">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="">
											Apellido materno:
										</label>
										<input type="text" name="apellidoMaterno" class="form-control" value="{{ ucwords($user->candidate->second_last_name) }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="">
											Edad:
										</label>
										<input type="number" name="edad" class="form-control">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="">
											Genero:
										</label>
										<select name="genero" class="form-control">
											<option value="">Selecciona</option>
											@foreach($genders as $gender)
												<option value="{{ $gender->id }}">{{ ucwords($gender->name) }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 text-right">
									<button type="submit" class="btn btn-primary btn-labeled">
										<b><i class="icon-floppy-disk"></i></b>
										Guardar
									</button>
								</div>
							</div>
						</fieldset>
					</form>
					
					<!-- labor goal -->
					<form class="form-basic ui-formwizard" action="#">
						<fieldset class="step" id="step1">
							<h6 class="form-wizard-title text-semibold">
								<span class="form-wizard-count">2</span>
								Objetivo laboral
							</h6>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">
											¿Cual es tu objetivo laboral?
										</label>
										<textarea name="" id="" cols="30" rows="7" class="form-control"></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 text-right">
									<button type="submit" class="btn btn-primary btn-labeled">
										<b><i class="icon-floppy-disk"></i></b>
										Guardar
									</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop