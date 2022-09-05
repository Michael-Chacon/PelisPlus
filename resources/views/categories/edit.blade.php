@extends('layout')
@section('content')
<h2 class="text-center">Actulizar categoria</h2>
<section class="row justify-content-center mt-5">
	<section class="col-md-4">
		<form action="{{ route('categories.update', $category) }}" method="post">
			@csrf @method('PATCH')
			<div class="modal-body">
				<div class="mb-3">
					<label for="categoria" class="form-label">Nombre de la categoria:</label>
					<input type="text" class="form-control" id="categoria" placeholder="Categoria" name="name" value="{{ $category->name }}">
				</div>
				<div class="mb-3">
					<label for="urlCategoria" class="form-label">Url</label>
					<input type="text" class="form-control" id="urlCategoria" placeholder="Url de la categoria" name="url" value="{{ $category->url }}">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</form>
	</section>
</section>
@endsection
