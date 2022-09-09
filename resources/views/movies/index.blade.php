@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center">
	<h1>Listado de peliculas</h1>
  @can('create', $movie)
	<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearPelicula">Crear pelicula</button>
  @endcan
</div>
<section class="row mb-5">
  @forelse($movies as $pelicula)
  <section class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    <div class="card">
      <img src="/storage/{{ $pelicula->img }}" class="card-img-top" alt="{{ $pelicula->title }}" style="height:300px; object-fit: cover;">
      <div class="card-body">
        <h5 class="card-title">{{ $pelicula->title }}</h5>
        <p class="card-text">{{ $pelicula->description}}</p>
        <a href="#" class="btn btn-success btn-sm">detalles</a>
        @can('create', $movie)
        <a href=" {{ route('movies.edit', $pelicula) }} " class="btn btn-primary btn-sm">Actualizar</a>
        <form action="{{ route('movies.destroy', $pelicula) }}" method="post">
          @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form>
        @endcan
        <a href="{{ route('categories.show', $pelicula->category)}}" class="badge badge-secondary text-dark">{{$pelicula->category->name}}</a>
      </div>
    </div>
  </section>
    @empty
    <li>No hay peliculas</li>
    @endforelse
</section>

    {{ $movies->links(); }}
<!-- Modal -->
<div class="modal fade" id="crearPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar imagen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('movies.store') }}" enctype="multipart/form-data" method="post">
      	@csrf
      	<div class="modal-body">
      		<div class="mb-3">
      			<label for="title" class="form-label">Titulo</label>
      			<input type="text" class="form-control" id="title" placeholder="Titulo" name="title" value="{{ old('title') }} ">
      		</div>
          <div class="mb-3">
            <label for="title" class="form-label">Seleccione una categoria</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
              <option ></option>
              @forelse($categories as $id => $title)
              <option value="{{ $id }}">{{ $title }}</option>
              @empty
              <option>No hay categorias registradas</option>
              @endforelse
            </select>
          </div>
      		<div class="mb-3">
      			<label for="img" class="form-label">Imagen de portada</label>
      			<input class="form-control" type="file" id="img" name="img" value="{{ old('img') }}">
      		</div>
      		<div class="row">
      			<div class="col-md-6">
      				<div class="mb-3">
      					<label for="url" class="form-label">Url:</label>
      					<input type="text" class="form-control" id="url" placeholder="url" name="url" {{ old('url') }}>
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="mb-3">
      					<label for="año" class="form-label">Año:</label>
      					<input type="number" class="form-control" id="año" placeholder="Año" name="year" {{ old('year') }}>
      				</div>
      			</div>
      		</div>
      		<div class="mb-3">
      			<label for="descripcion" class="form-label">Descripcion de la pelicula:</label>
      			<textarea class="form-control" id="descripcion" rows="3" name="description"> {{ old('descripcion') }} </textarea>
      		</div>
      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
      		<button type="submit" class="btn btn-success">Guardar</button>
      	</div>
      </form>
    </div>
  </div>
</div>
@endsection
