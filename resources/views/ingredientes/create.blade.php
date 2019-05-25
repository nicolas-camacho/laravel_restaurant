@extends('layouts.app')

@section('content')
<div class="container">
	<form action="/i/new" enctype="multipart/form-data" method="post">
		@csrf

		<div class="row">
			<div class="col-8 offset-2">
				<div class="row">
					<h1>Agregar nuevo ingrediente</h1>
				</div>
				<div class="form-group row">
					<label for="nombre" class="col-md-4 col-form-label">Nombre del Ingrediente</label>

					<input type="text" id="nombre" class="form-control @error('nombre') is-valid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

					@error('nombre')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="proveedor" class="col-md-4 col-form-label">Proveedor del Ingrediente</label>
	
					<input type="text" id="proveedor" class="form-control @error('proveedor') is-valid @enderror" name="proveedor" value="{{ old('proveedor') }}" required autocomplete="proveedor" autofocus>
	
					@error('proveedor')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="row pt-4">
					<button class="btn btn-success">
						Agregar Ingrediente
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection