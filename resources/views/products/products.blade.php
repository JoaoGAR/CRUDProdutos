@extends('shared.master')
@section('conteudo')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			@if ($errors->any())
			<div class="alert alert-danger text-center" id="errors-div">
				@foreach ($errors->all() as $error)
				<p><b>{{ $error }}</b></p>
				@endforeach
			</div>
			@endif

			@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
			@endif

			<div class="row">
				@include('products.products_table')
			</div>
		</div>

		<div class="col-md-1">
			@foreach($top_tags as $top_tag)
			<p>{{ $top_tag->id_tag }}</p>
			@endforeach
		</div>
	</div>
</div>

@endsection