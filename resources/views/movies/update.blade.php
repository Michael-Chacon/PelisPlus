@extends('layout')
@section('content')
<section class="row justify-content-center">
	<section class="col-md-4">
		 <form action="{{ route('movies.update', $movie) }}" enctype="multipart/form-data" method="post">
      	@csrf @method('PATCH')
      	<div class="modal-body">
      		<div class="mb-3">
      			<label for="title" class="form-label">Titulo</label>
      			<input type="text" class="form-control" id="title" placeholder="Titulo" name="title" value="{{ old('title', $movie->title) }} ">
      		</div>
          <div class="mb-3">
            <label for="title" class="form-label">Seleccione una categoria</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
              <option ></option>
              @forelse($categories as $id => $title)
              <option value="{{ $id }}"
              	@if($id === $movie->category_id)selected @endif>
              		{{ $title }}</option>
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
      					<input type="text" class="form-control" id="url" placeholder="url" name="url" value="{{ old('url', $movie->url) }}">
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="mb-3">
      					<label for="año" class="form-label">Año:</label>
      					<input type="number" class="form-control" id="año" placeholder="Año" name="year" value="{{ old('year', $movie->year)}}">
      				</div>
      			</div>
      		</div>
      		<div class="mb-3">
      			<label for="descripcion" class="form-label">Descripcion de la pelicula:</label>
      			<textarea class="form-control" id="descripcion" rows="3" name="description"> {{ old('descripcion', $movie->description) }} </textarea>
      		</div>
      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancelar</button>
      		<button type="submit" class="btn btn-success">Guardar</button>
      	</div>
      </form>
	</section>
</section>
@endsection