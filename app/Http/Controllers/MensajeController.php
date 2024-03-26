<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Mensaje;
use App\Http\Controllers\Controller;
use App\Models\Suscriptor;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = Mensaje::all();
        $categorias = Categoria::all();
        
        $datos = [
            'mensajes' => $mensajes,
            'categorias' => $categorias
        ];
        return view('mensaje.index', $datos);
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
                'categoria' => 'required',
                'mensaje' => 'required'
            ]
            );
        $mensaje = Mensaje::create( $datos );
        $cat = $request->categoria;
        $suscriptores = Suscriptor::where('suscrito', 'like', '%'.$cat.'%')->get();
        foreach ($suscriptores as &$suscriptor) {
            $noti = $suscriptor->canales;
            $notiarray = explode(" ", $noti);
            $numElementos = count($notiarray);
            for($i = 0; $i < $numElementos; $i++) {
                $noticanal = $notiarray[$i];
                Log::channel('message')->info("Categoria : {$request->categoria}, Mensaje : {$request->mensaje}, Notificacion : {$noticanal}, Usuario : {$suscriptor->nombre}");
            }
            
        }
        return redirect()->route('mensajes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensaje $mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensaje $mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }
}
