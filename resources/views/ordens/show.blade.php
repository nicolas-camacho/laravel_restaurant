@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center p-5">
		<form action="/o/{{ $orden->id }}/cancel" method="post">
			@csrf
			@method('PATCH')
			<div class="card">
					<img class="card-img-top" src="holder.js/100px180/" alt="">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="list-group" id="list-tab" role="tablist"> 
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<div class="row">
											<div class="col">
												<strong>Mesa:</strong>
											</div>
											<div class="col">
												{{ $orden->numMesa }}
											</div>
										</div>
									</li>
									@foreach ($orden->platos as $item)
											<li class="list-group-item justify-content-between align-items-center">
												<div class="row">
													<div class="col">
														{{ $item->nombre }} ({{ $item->pivot->cantidad }}):
													</div>
													<div class="col">
														${{ $item->pivot->valor }}
													</div>
												</div>
											</li>
									@endforeach
									<li class="list-group-item justify-content-between align-items-center">
										<div class="row">
											<div class="col">
												<strong>Total: </strong>
											</div>
											<div class="col">
												${{ $total }}
											</div>
										</div>
									</li>
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-danger">Liquidar</button>
				</div>
		</form>
	</div>
</div>
		
@endsection