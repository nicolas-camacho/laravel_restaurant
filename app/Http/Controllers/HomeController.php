<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;
use App\Plato;
use App\Orden;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ingredientes = Ingrediente::all();
        $platos = Plato::all();
        $ordenes = Orden::all();
        return view('home', [
            'ingredientes' => $ingredientes,
            'platos' => $platos,
            'ordenes' => $ordenes,
        ]);
    }
}
