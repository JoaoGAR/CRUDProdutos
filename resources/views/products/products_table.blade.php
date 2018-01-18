@foreach($products as $product)
<div class="col-md-3">
	<div class="well clearfix">
		<div class="row">
			<div class="col-md-6">
				<a href="/edit/product/{{ $product->id }}">EDITAR</a>
			</div>

			<div class="col-md-6">
				<a href="/delete/product/{{ $product->id }}">EXCLUIR</a>
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<img class="img-responsive" src="{{ asset('images/') }}/{{ $product->image }}" alt="{{ $product->title }}">
		</div>

		<div class="col-md-12">
			<h4>{{ $product->title }}</h4>
		</div>

		<div class="col-md-12">
			{!! $product->description !!}
		</div>

		<div class="col-md-12">
			@foreach($product->tags as $tag)
			<p>{{ $tag->name }}</p>
			@endforeach
		</div>
	</div>
</div>

@endforeach
<div>
	{{ $products->links() }}
</div>
