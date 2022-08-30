@extends('layout')
@section('content')
<section class="container-fluid">
	<section class="row justify-content-center">
		<div class="d-flex justify-content-between align-items-center">
			<h1>Categorias registradas</h1>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearCategoria">
				Crear categoria
			</button>
		</div>
		<article class="col-md-4">
			<table class="table">
				<tbody>
					@forelse($category as $categoria)
						<tr>
							<td><p>{{ $categoria->name }}</p></td>
							<td><a href="#" class="link-primary"><i class="bi bi-pen tamaño-icono"></i></a></td>
							<td>
								<form action="{{ route('categories.destroy', $categoria) }}" method="post">
									@csrf @method('DELETE')
									<button  type="submit" class="btn"><i class="bi bi-trash"></i></button>
								</form>
							</td>
						</tr>
				@empty
				<div class="alert alert-danger text-center">No hay categorias</div>
			@endforelse
				</tbody>
			</table>
		</article>
	</section>
</section>
<!-- Modal -->
<div class="modal fade" id="crearCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('categories.store') }}" method="post">
      	@csrf
      	<div class="modal-body">
      		<div class="mb-3">
      			<label for="categoria" class="form-label">Nombre de la categoria:</label>
      			<input type="text" class="form-control" id="categoria" placeholder="Categoria" name="name">
      		</div>
      		<div class="mb-3">
      			<label for="urlCategoria" class="form-label">Url</label>
      			<input type="text" class="form-control" id="urlCategoria" placeholder="Url de la categoria" name="url">
      		</div>
      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      		<button type="submit" class="btn btn-primary">Save changes</button>
      	</div>
      </form>
    </div>
  </div>
</div>
@endsection