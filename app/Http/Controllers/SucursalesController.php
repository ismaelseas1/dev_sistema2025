<?php

namespace App\Http\Controllers;

use App\Models\Sucursales;
use Illuminate\Http\Request;
class SucursalesController extends Controller

{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sucursales = Sucursales::all();
    return view('modulos.users.Sucursales', compact('sucursales'));
       /* if(auth::user()->rol != 'Administrador') {
            return redirect('Inicio');
            $sucursales = Sucursales::all();
            return view('modulos.users.Sucursales', compact('sucursales'));
        } else {
            return redirect('Inicio');
        } CODIGO PARA APLICAR RESTRICONES A USUARIOS QUE NO SEAN ADMINISTRADORES */
        
        /*return view('modulos.users.Sucursales');  codigo antiguo */
    }

    /**
     * Show the form for creating a new resource.
   

    
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Sucursales::create([
            'nombre'=>$request->nombre,
            'estado'=>1,
        ]);
        return redirect('Sucursales')->with('success', 'Sucursal creada correctamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Sucursales $sucursales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_sucursal)
    {
        $sucursal = Sucursales::find($id_sucursal);
        return response()->json($sucursal);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Sucursales::where('id', $request->id)->update([
            'nombre' => $request->nombre]);
        return redirect('Sucursales')->with('success', 'Sucursal actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function CambiarEstado($estado, $id_sucursal)
    {
        Sucursales::find($id_sucursal)->update(['estado' => $estado]);
        return redirect('Sucursales')->with('success', 'Estado de la sucursal actualizado correctamente');
    }
}
