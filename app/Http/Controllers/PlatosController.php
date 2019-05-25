<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plato;
use App\Ingrediente;

class PlatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $platos = Plato::all();
        return view('platos.index', [
            'platos' => $platos,
        ]);
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();
        return view('platos.create', [
            'ingredientes' => $ingredientes,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'valor' => 'required',
        ]);
        
        Plato::create([
            'nombre' => $data['nombre'],
            'valor' => $data['valor'],
        ]);
        
        $id = Plato::latest()->first();
        $newData = request()->ingredientes;
        $quantities = array_filter(request()->cantidad);
        
        foreach (array_combine($newData, $quantities) as $value => $quantity) {
            $id->ingredientes()->attach($value, [
                'cantidad' => $quantity
            ]);
        }

        return redirect('/p');
    }
}
