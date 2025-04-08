<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;

class UsuariosController extends Controller
{
    public function PrimerUsuario()
    {
      /*User::create([
        'name' => 'Ismael',
        'email' => 'ismaelseas1@gmail.com',
        'foto' => '',
        'estado' => '1',
        'ultimo_login' => now(),
        'rol' =>  'Administrador',
        'password' =>Hash::make('8241588'),
        'id_sucursal'=>'0',


       ]);*/
    }

    public function AtualizarMisDatos(Request $request)
    {
        if(Auth::user()->email != request('email')){
            if (request('password')){
                $datos = request()->validate([
                    'name' => ['required','string','max:255'],
                    'email' => ['required','email','unique:users'],
                    'password' => ['required','string','min:8'],
                ]);

            }else{
                $datos = request()->validate([
                    'name' => ['required','string','max:255'],
                    'email' => ['required','email','unique:users'],
                ]);
            }
        }else{
            if (request('password')){
                $datos = request()->validate([
                    'name' => ['required','string','max:255'],
                    'email' => ['required','email'],
                    'password' => ['required','string','min:8'],
                ]);
            }else{
                $datos = request()->validate([
                    'name' => ['required','string','max:255'],
                    'email' => ['required','email'],
                ]);
            }
        }
        if (request('fotoPerfil')){
            if(Auth::user()->foto != ''){
                $path = storage_path('app/public/'.Auth::user()->foto);
                unlink($path);
            }
            $rutaImg= $request['fotoPerfil']->store('uisers','public');
        }else{
            $rutaImg = Auth::user()->foto;
        }
        if(isset($datos['password'])){
            DB::table('users')->where('id', Auth::user()->id)
            ->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'foto' => $rutaImg,
                'password' => Hash::make($datos['password']),
            ]);
        }else{
            DB::table('users')->where('id', Auth::user()->id)
            ->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'foto' => $rutaImg,
            ]);
        }
        return redirect('Mis-Datos')->with('success', 'Datos Actualizados Correctamente');
            
    }
    public function index()
    {

        if (!Auth::check()) {
            return redirect('login')->with('error', 'Debes iniciar sesión para acceder.');
        }
    
        $usuarios = User::all();
        return view('modulos.users.Usuarios', compact('usuarios'));
       /* if(Auth::user()->rol != 'Administrador'){
            return redirect('Inicio')->with('error', 'No tienes permisos para acceder a esta sección');
        }
        $usuarios= User::all();
        return view('modulos.users.Usuarios', compact('usuarios'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaEmail = request()->validate([
            'email' => ['unique:users'],
        ]);
        $datos =request();
        if($datos["rol"] != 'Administrador'){
        $id_sucursal = 0;
        }else{
            $id_sucursal = $datos["id_sucursal"];
        }
        User::create([
            'name' => $datos['name'],
            'email' => $validaEmail['email'],
            'foto' => '',
            'estado' => '1',
            'ultimo_login' => now(),
            'rol' =>  $datos['rol'],
            'password' =>Hash::make($datos['password']),
            'id_sucursal'=>$id_sucursal,
        ]);
        return redirect('Usuarios')->with('success', 'Usuario Creado Correctamente');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
