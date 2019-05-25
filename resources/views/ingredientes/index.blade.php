@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
			<div class="col">
				<div class="row justify-content-between">
					<div class="col-md-6">
						<h1 style="font-size:80px">Ingredientes</h1>
					</div>
					<div class="col-md-3 pt-5 pb-2">
						<a href="/i/create">
							<button class="btn btn-success">
								Agregar nuevo ingrediente
							</button>
						</a>
					</div>
				</div>
				<div class="row">
					<ul class="list-group w-100">
						@foreach ($ingredientes as $item)
							<li class="list-group-item">
								<div class="d-flex w-100 justify-content-between">
									<h5>{{ $item->nombre }}</h5>
									<div class="btn-group" role="group">
										<a href="#">
											<button class="btn btn-primary">
												<i class="fas fa-edit"></i>
											</button>
										</a>
										<a href="#">
											<button class="btn btn-danger">
												<i class="far fa-trash-alt"></i>
											</button>
										</a>
									</div>
								</div>
								<small>Proveedor: {{ $item->proveedor }}</small>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
</div>
@endsection