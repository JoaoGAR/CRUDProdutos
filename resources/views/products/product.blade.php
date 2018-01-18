@extends('shared.master')
@section('conteudo')

<div class="container">
	<div class="clearfix">

		<div class="well col-md-8 col-md-offset-2">
			<div class="col-md-12">
				<label for="image">Imagem</label>
				<img class="img-responsive" src="{{ asset('images/') }}/{{ $product->image }}" alt="{{ $product->title }}">
			</div>

			<div class="col-md-12">
				<label for="title">Produto</label>
				<label for="">{{ $product->title }}</label>
			</div>

			<div class="col-md-3">
				<label for="stock">Estoque</label>
				<label for="">{{ $product->stock }}</label>
			</div>

			<div class="col-md-12">
				<label for="tags[]">Tags</label>
				<div class="col-md-12">
					@foreach($product->tags as $tag)
					<div class="col-md-3 col-sm-3">
						<span class="badge">{{ $tag->name }}</span>
					</div>
					@endforeach
				</div>
			</div>

			<div class="col-md-12">
				<label for="description">Descrição</label>
				<div>
					{!! $product->description !!}
				</div>
			</div>
		</div>

	</div>
</div>

@endsection