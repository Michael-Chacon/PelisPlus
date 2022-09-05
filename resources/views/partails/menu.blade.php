
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			@auth
			<a class="navbar-brand" href="{{ route('home') }}">{{ auth()->user()->name }}</a>
			@else
			<a class="navbar-brand" href="">{{ config('app.name') }}</a>
			@endauth
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('movies.index') }}">Peliculas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Papelera</a>
					</li>
					@auth
					<li class="nav-item">
						<a class="nav-link text-danger" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">Salir</a>
					</li>
					@else
					<li class="nav-item">
						<a href="{{route('login') }}" class="nav-link" type="submit">login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">Register</a>
					</li>
					@endauth
				</ul>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
			</form>
		</div>
		</div>
	</nav>
