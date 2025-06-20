<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Piloto;

class PilotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obteniendo todos los predios de la base de datos
        $pilotos = Piloto::all();
        //Renderizando la vista con los predios
        return view('pilotos.index', compact('pilotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Renderizando el formulario para crear un nuevo predio
        return view('pilotos.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = [
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'latitud1' => $request->latitud1,
            'longitud1' => $request->longitud1,
            'latitud2' => $request->latitud2,
            'longitud2' => $request->longitud2,
            'latitud3' => $request->latitud3,
            'longitud3' => $request->longitud3,
        ];
        //Guardando los datos en la base de datos
        Piloto::create($datos);
        return redirect()->route('pilotos.index')->with('success', 'Piloto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $piloto = Piloto::findOrFail($id);
        return view('pilotos.editar', compact('piloto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $piloto = Piloto::findOrFail($id);
        $piloto->update([
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'latitud1' => $request->latitud1,
            'longitud1' => $request->longitud1,
            'latitud2' => $request->latitud2,
            'longitud2' => $request->longitud2,
            'latitud3' => $request->latitud3,
            'longitud3' => $request->longitud3,
        ]);
        return redirect()->route('pilotos.index')->with('success', 'Piloto actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $piloto = Piloto::findOrFail($id);
        $piloto->delete();
        return redirect()->route('pilotos.index')->with('success', 'Piloto eliminado exitosamente');
    }
}
