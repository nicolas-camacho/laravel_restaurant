@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center p-5">
        <h1 style="font-size: 84px">Bienvenido</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col" align="center">
                            <a href="/i">
                                <button class="btn btn-primary">
                                    Ingredientes <span class="badge badge-light">{{ $ingredientes->count() }}</span>
                                </button>
                            </a>
                        </div>
                        <div class="col" align="center">
                            <button class="btn btn-success">
                                Platos <span class="badge badge-light">{{ $platos->count() }}</span>
                            </button>
                        </div>
                        <div class="col" align="center">
                            <button class="btn btn-dark">
                                Ordenes <span class="badge badge-light">{{ $ordenes->count() }}</span>
                            </button>    
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
