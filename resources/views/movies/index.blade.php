@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center">
	<h1>Listado de peliculas</h1>
	<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearPelicula">Crear pelicula</button>
</div>
<section class="row">
<section class="col-md-4">

</section>
</section>

<!-- Modal -->
<div class="modal fade" id="crearPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="">
      	<div class="modal-body">
      		<div class="mb-3">
      			<label for="title" class="form-label">Titulo</label>
      			<input type="email" class="form-control" id="title" placeholder="title" name="title">
      		</div>
      		<div class="mb-3">
      			<label for="formFile" class="form-label">Imagen de potada</label>
      			<input class="form-control" type="file" id="formFile" name="img">
      		</div>
      		<div class="row">
      			<div class="col-md-6">
      				<div class="mb-3">
      					<label for="title" class="form-label">Url:</label>
      					<input type="email" class="form-control" id="title" placeholder="title" name="url">
      				</div>
      			</div>
      			<div class="col-md-6">
      				<div class="mb-3">
      					<label for="title" class="form-label">Año:</label>
      					<input type="email" class="form-control" id="title" placeholder="title" name="yeat">
      				</div>
      			</div>
      		</div>
      		<div class="mb-3">
      			<label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
      			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title"></textarea>
      		</div>
      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      		<button type="button" class="btn btn-primary">Save changes</button>
      	</div>
      </form>
    </div>
  </div>
</div>
@endsection
