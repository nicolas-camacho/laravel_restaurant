@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
			<div class="col">
				<div class="row justify-content-between">
					<div class="col-md-6">
						<h1 style="font-size:80px">Platos</h1>
					</div>
					<div class="col-md-3 pt-5 pb-2">
						<a href="/p/create">
							<button class="btn btn-success">
								Agregar nuevo plato
							</button>
						</a>
					</div>
				</div>
				<div class="row">
					<ul class="list-group w-100">
						@foreach ($platos as $item)
							<li class="list-group-item">
								<div class="d-flex w-100 justify-content-between">
									<h5>{{ $item->nombre }}</h5>
									<div class="btn-group" role="group">
										<a href="#">
											<button class="btn btn-primary">
												<i class="fas fa-edit"></i>
											</button>
										</a>
									</div>
								</div>
								<small>Ingredientes:
									@foreach ($item->ingredientes as $value)
											({{ $value->pivot->cantidad }}) {{ $value->nombre }}, 
									@endforeach
								</small>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
</div>
@endsection