<header class="navbar navbar-expand-lg navbar-light bg-light">
	{{-- logo --}}
	<a class="navbar-brand" href="#">Navbar</a>

	{{-- hamburguer menu --}}
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<nav class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li>
				<a class="nav-link" href="#">Inicio</a>
			</li>

			<li class="nav-item dropdown">
				<a href="" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Candidato
				</a>

				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ url('candidate') }}">Iniciar sesión</a>
					<a class="dropdown-item" href="{{ url('candidate/account') }}">Registrarme</a>
				</div>
			</li>
		</ul>
	</nav>
</header>