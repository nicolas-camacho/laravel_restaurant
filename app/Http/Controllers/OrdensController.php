<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\Plato;

class OrdensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ordens = Orden::all();
        return view('ordens.index', [
            'ordens' => $ordens,
        ]);
    }

    public function create()
    {
        $platos = Plato::all();
        return view('ordens.create', [
            'platos' => $platos,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'numMesa' => 'required'
        ]);

        Orden::create([
            'numMesa' => $data['numMesa'],
        ]);

        $id = Orden::latest()->first();
        $newData = request()->platos;
        $quantities = array_filter(request()->cantidad);
        $valor = 0;

        foreach (array_combine($newData, $quantities) as $value => $quantity) {
           $valor = $valor + (Plato::find($value)->valor * $quantity);
        }

        foreach (array_combine($newData, $quantities) as $value => $quantity) {
            $id->platos()->attach($value, [
                'cantidad' => $quantity,
                'valor' => $valor
            ]);
        }
    }
}

