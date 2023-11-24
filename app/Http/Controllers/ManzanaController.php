<?php

namespace App\Http\Controllers;

use App\Models\Manzana;
use Illuminate\Http\Request;

class ManzanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manzanas = Manzana::all();
        return view('verManzanas', ['manzanas' => $manzanas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos si es necesario
        $request->validate([
            'tipoManzana' => 'required|string|max:100',
            'precioKilo' => 'required|numeric',
        ]);
        // Utilizando Eloquent para crear una nueva Manzana
        $manzana = new Manzana;
        $manzana->tipoManzana = $request->input('tipoManzana');
        $manzana->precioKilo = $request->input('precioKilo');
    
        $manzana->save();
        return redirect()->route('MostrarManzanas')->with('success', 'Manzana
    insertada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manzana $manzana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manzana $manzana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validación de datos si es necesario
        $request->validate([
            'tipoManzana' => 'required|string|max:100',
            'precioKilo' => 'required|numeric',
        ]);
        // Busca la manzana en la base de datos
        $manzana = Manzana::find($request->input('id'));
        if ($manzana) {
            // Actualiza los valores del objeto $manzana con los nuevos
            // valores del formulario
            $manzana->tipoManzana = $request->input('tipoManzana');
            $manzana->precioKilo = $request->input('precioKilo');

            // Guarda los cambios en la base de datos
            $manzana->save();
            // Redirige a la vista correspondiente con un mensaje de éxito
            return redirect()->route('MostrarManzanas')->with(
                'successModificar',
                'Manzana modificada correctamente'
            );
        } else {
            // Redirige a la vista correspondiente con un mensaje de error
            return redirect()->route('MostrarManzanas')->with('errorModificar', 'Manzana
    no encontrada');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manzana $manzana)
    {
        $manzana->delete();
        return redirect()->route('MostrarManzanas');
    }
}
