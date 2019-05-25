@extends('layouts.app')

@section('content')
<div class="container">
	<form action="/p/new" enctype="multipart/form-data" method="post">
		@csrf

		<div class="row">
			<div class="col-8 offset-2">
				<div class="row">
					<h1>Agregar nuevo plato</h1>
				</div>
				<div class="form-group row">
					<label for="nombre" class="col-md-4 col-form-label">Nombre del Plato</label>

					<input type="text" id="nombre" class="form-control @error('nombre') is-valid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

					@error('nombre')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="valor" class="col-md-4 col-form-label">Valor del Plato</label>
	
					<input type="number" id="valor" class="form-control @error('valor') is-valid @enderror" name="valor" value="{{ old('valor') }}" required autocomplete="valor" autofocus>
	
					@error('valor')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="row justify-content-between">
					@foreach ($ingredientes as $item)
						<div class="form-check">
							<input type="checkbox" class="form-check-input" name="ingredientes[]" value="{{ $item->id }}" id="ingrediente">
							<label for="ingrediente" class="form-check-label">
								{{ $item->nombre }}
							</label>

							<label for="cantidad" class="col-md-4 col-form-label">Cantidad:</label>
							<input type="number" id="cantidad" class="form-control" name="cantidad[]">
						</div>
					@endforeach
				</div>

				<div class="row pt-4">
					<button class="btn btn-success">
						Agregar Plato
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection