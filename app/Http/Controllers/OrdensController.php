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
        $ordens = Orden::all()->where('estado', '=', 'N');
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
            'numMesa' => ['required', 'unique:ingredientes,nombre'],
        ]);

        Orden::create([
            'numMesa' => $data['numMesa'],
        ]);

        $id = Orden::latest()->first();
        $newData = request()->platos;
        $quantities = array_filter(request()->cantidad);
        $valor = 0;

        foreach (array_combine($newData, $quantities) as $value => $quantity) {
            $valor = 0;
            $valor += (Plato::find($value)->valor * $quantity);
            $id->platos()->attach($value, [
                'cantidad' => $quantity,
                'valor' => $valor,
            ]);
        }
        
        return redirect('/o');
    }

    public function edit(Orden $orden)
    {
        $platos = Plato::all();
        $seleccionados = $orden->platos;
        return view('ordens.edit', compact('orden'), [
            'seleccionados' => $seleccionados,
            'platos' => $platos,
        ]);
    }

    public function update(Orden $orden)
    {
        $data = request()->validate([
            'numMesa' => 'required',
        ]);

        $newData = request()->platos;
        $quantities = array_filter(request()->cantidad);
        $valor = 0;
        
        $orden->platos()->detach();
        foreach (array_combine($newData, $quantities) as $value => $quantity) {
            $valor = 0;
            $valor += (Plato::find($value)->valor * $quantity);
            $orden->platos()->attach($value, [
                'cantidad' => $quantity,
                'valor' => $valor,
            ]);
        }

        $orden->update();

        return redirect("/o");
    }

}

