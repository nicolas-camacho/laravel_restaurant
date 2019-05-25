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

    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'proveedor' => 'required',
        ]);

        Ingrediente::create([
            'nombre' => $data['nombre'],
            'proveedor' => $data['proveedor'],
        ]);

        return redirect('/i');
    }
}
