@extends('layouts.app')

@section('content')
<div class="container">
	<form action="/o/{{ $orden->id }}" enctype="multipart/form-data" method="post">
		@csrf
		@method('PATCH')

		<div class="row">
			<div class="col-8 offset-2">
				<div class="row">
					<h1>Editar Orden</h1>
				</div>
				<div class="form-group row">
					<label for="numMesa" class="col-md-4 col-form-label">Numero de mesa</label>

					<input type="number" id="numMesa" class="form-control @error('numMesa') is-invalid @enderror" name="numMesa" value="{{ $orden->numMesa }}" required autocomplete="numMesa" autofocus>

					@error('numMesa')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="row justify-content-between">
					@foreach ($platos as $item)
						<div class="form-check">
							<input type="checkbox" @if($seleccionados->contains($item->id)) checked=checked @endif class="form-check-input" name="platos[]" value="{{ $item->id }}" id="platos">
							<label for="ingrediente" class="form-check-label">
								{{ $item->nombre }}
							</label>

							<label for="cantidad" class="col-md-4 col-form-label">Cantidad:</label>
							<input type="number" @if($seleccionados->contains($item->id)) value="{{$seleccionados->find($item->id)->pivot->cantidad}}"@endif id="cantidad" class="form-control" name="cantidad[]">
						</div>
					@endforeach
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