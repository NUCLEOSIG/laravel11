<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Notificacion;
use App\Models\Suscriptor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuscriptorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suscriptores = Suscriptor::all();
        $categorias = Categoria::all();
        $notificaciones = Notificacion::all();
        $datos = [
            'suscriptores' => $suscriptores,
            'categorias' => $categorias,
            'notificaciones' => $notificaciones
        ];
        return view('suscriptor.index', $datos);
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
        $datos = $request->validate(
            [
                'nombre' => 'required',
                'email' => 'required',
                'telefono' => 'required',
                'suscrito' => 'required',
                'canales' => 'required'
            ]
            );
        $suscriptor = Suscriptor::create( $datos );
        return redirect()->route('suscriptores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suscriptor $suscriptor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suscriptor $suscriptor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suscriptor $suscriptor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suscriptor $suscriptor)
    {
        //
    }
}
