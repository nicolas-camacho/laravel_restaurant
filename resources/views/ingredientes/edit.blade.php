@extends('layouts.app')

@section('content')
<div class="container">
	<form action="/i/{{ $ingrediente->id }}" enctype="multipart/form-data" method="post">
		@csrf
		@method('PATCH')

		<div class="row">
			<div class="col-8 offset-2">
				<div class="row">
					<h1>Editar ingrediente</h1>
				</div>
				<div class="form-group row">
					<label for="nombre" class="col-md-4 col-form-label">Nombre del Ingrediente</label>

					<input value="{{ $ingrediente->nombre }}" type="text" id="nombre" class="form-control @error('nombre') is-invalid @enderror" name="nombre" required autocomplete="nombre" autofocus>

					@error('nombre')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="proveedor" class="col-md-4 col-form-label">Proveedor del Ingrediente</label>
	
					<input value="{{ $ingrediente->proveedor }}" type="text" id="proveedor" class="form-control @error('proveedor') is-invalid @enderror" name="proveedor" value="{{ old('proveedor') }}" required autocomplete="proveedor" autofocus>
	
					@error('proveedor')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="row pt-4">
					<button class="btn btn-success">
						Guardar Cambios
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection