@extends('shared.master')
@section('conteudo')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-sm-12">
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
			<div class="row">
				{{ $products->links() }}
			</div>
		</div>

		<div class="col-md-2 col-sm-12">
			<div class="list-group">
				<h3 style="margin-top:0" class="list-group-item list-group-item-info" disabled>Top Tags</h3>
				@foreach($top_tags as $top_tag)
				<a href="#" class="list-group-item">{{ $top_tag->tag->name }}</a>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection