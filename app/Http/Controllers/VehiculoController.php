<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $vehiculos = Vehiculo::all();
        // return view('modulos.vehiculos.index', compact('vehiculos'));
        $vehiculos = Vehiculo::all();
        return view('modulos.users.vehiculo', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('modulos.users.vehiculo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'placa' => 'required|string|max:10|unique:vehiculos',
            'marca' => 'required|string|max:50',
            'año' => 'required|string|max:4',
            'descripcion' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:vehiculos',
            'modelo' => 'required|string|max:50',
            'color' => 'required|string|max:20',
            'categoria' => 'required|string|max:20',
            'tipo' => 'required|string|max:20',
            'estado' => 'string|max:20|in:disponible,no disponible',
            // Add other validation rules as needed
        ]);
        Vehiculo::create($request->all());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
        $request->validate([
            'placa' => 'required|string|max:10|unique:vehiculos,placa,' . $vehiculo->id,
            'marca' => 'required|string|max:50',
            'año' => 'required|string|max:4',
            'descripcion' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:vehiculos,codigo,' . $vehiculo->id,
            'modelo' => 'required|string|max:50',
            'color' => 'required|string|max:20',
            'categoria' => 'required|string|max:20',
            'tipo' => 'required|string|max:20',
            // Add other validation rules as needed
        ]);
        $vehiculo->update($request->all());
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');
    }
}
