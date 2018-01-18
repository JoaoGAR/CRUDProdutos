@foreach($products as $product)
<div class="col-md-3 col-xs-12">
	<div class="well clearfix">
		<div class="row">
			<div class="col-md-4 col-sm-12 text-center">
				<a href="/edit/product/{{ $product->id }}">EDITAR</a>
			</div>

			<div class="col-md-4 col-sm-12 text-center">
				<a href="/show/product/{{ $product->id }}">VER</a>
			</div>

			<div class="col-md-4 col-sm-12 text-center">
				<a href="/delete/product/{{ $product->id }}">EXCLUIR</a>
			</div>
		</div>

		<div class="col-sm-6 col-sm-offset-3">
			<img class="img-responsive" src="{{ asset('images/') }}/{{ $product->image }}" alt="{{ $product->title }}">
		</div>

		<div class="col-sm-12">
			<h4>{{ $product->title }}</h4>
		</div>

		<div class="col-sm-12">
			{!! $product->description !!}
		</div>

		<div class="row">
			@foreach($product->tags as $tag)
			<div class="col-md-6 col-sm-3">
				<span class="badge">{{ $tag->name }}</span>
			</div>
			@endforeach
		</div>
	</div>
</div>

@endforeach
