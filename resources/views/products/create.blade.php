@extends('shared.master')
@section('conteudo')

<div class="container">
	<form class="col-md-10 col-md-offset-1 well" action="{{ route('create/product') }}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
		<div class="clearfix">

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

			<div class="col-md-6">
				<label for="title">Produto</label>
				<input class="form-control" name="title" type="text" placeholder="Informe o produto." required>
			</div>

			<div class="col-md-3">
				<label for="stock">Estoque</label>
				<input class="form-control" name="stock" type="number" placeholder="Informe quantidade em estoque." required>
			</div>

			<div class="col-md-12">
				<label for="image">Imagem</label>
				<input class="form-control" name="image" type="file" accept=".jpg, .jpeg, .png, .gif" required>
			</div>

			<div class="col-md-12">
				<label for="description">Descrição</label>
				<textarea style="resize: none;" class="form-control" rows="4" cols="50" name="description" placeholder="Informe a descrição do produto."></textarea>
			</div>

			<div class="col-md-12">
				<label for="tags[]">Tags</label>
				<div class="col-md-12">
					@foreach($tags as $tag)
					<div class="col-md-2">
						<input id="{{ $tag->name }}" type="checkbox" name="tags[]" value="{{ $tag->id }}">
						<label for="{{ $tag->name }}">{{ $tag->name }}</label>
					</div>
					@endforeach
				</div>
			</div>

		</div>

		<hr>

		<div class="col-md-6 col-md-offset-3">
			<button class="btn btn-success btn-block btn-lg">Cadastrar</button>
		</div>
	</form>
</div>

@endsection