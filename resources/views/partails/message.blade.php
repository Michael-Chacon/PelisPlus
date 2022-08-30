@if(session('status'))
<section class="row justify-content-center">
	<article class="col-md-6">
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	</article>
</section>
@endif