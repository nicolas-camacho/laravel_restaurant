<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;

class IngredientesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(Request $data)
    {
        return $data->validate([
            'nombre' => ['required', 'unique:ingredientes,nombre'],
            'proveedor' => 'required',
        ]);
    }

    public function index()
    {
        $ingredientes = Ingrediente::all();
        return view('ingredientes.index', [
            'ingredientes' => $ingredientes,
        ]);
    }

    public function create()
    {
        return view('ingredientes.create');
    }

    public function store(Request $data)
    {
        $this->validator($data);

        Ingrediente::create([
            'nombre' => $data['nombre'],
            'proveedor' => $data['proveedor'],
        ]);

        return redirect('/i');
    }

    public function edit(Ingrediente $ingrediente)
    {
        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function update(Ingrediente $ingrediente)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'proveedor' => 'required',
        ]);
        
        $ingrediente->update($data);

        return redirect("/i");
        
    }
}
