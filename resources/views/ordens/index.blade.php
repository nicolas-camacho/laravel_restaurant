@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
			<div class="col">
				<div class="row justify-content-between">
					<div class="col-md-6">
						<h1 style="font-size:80px">Orden</h1>
					</div>
					<div class="col-md-3 pt-5 pb-2">
						<a href="/o/create">
							<button class="btn btn-success">
								Agregar Nueva Orden
							</button>
						</a>
					</div>
				</div>
				<div class="row">
					<ul class="list-group w-100">
						@foreach ($ordens as $item)
							<li class="list-group-item">
								<div class="d-flex w-100 justify-content-between">
									<h5>Mesa: {{ $item->numMesa }}</h5>
									<div class="btn-group" role="group">
										<a href="/o/{{ $item->id }}/edit">
											<button class="btn btn-primary">
												<i class="fas fa-edit"></i>
											</button>
										</a>
										<a href="#">
											<button class="btn btn-danger">
												<i class="far fa-window-close"></i>
											</button>
										</a>
									</div>
								</div>
								<small>Platos:
									@foreach ($item->platos as $value)
											{{ $value->nombre }} ({{ $value->pivot->cantidad }}) : 
											{{ $value->pivot->valor }}, 
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