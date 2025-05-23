<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SaludoController extends Controller
{
    public function formulario()
    {
        return view('saludo');
    }
    public function enviarNombre(Request $request)
    {
        $nombre = $request->input('nombre');

        $response = Http::post('http://localhost:5055/saludo', [
            'nombre' => $nombre,
        ]);

        $saludo = $response->successful()
            ? $response->json()['saludo']
            : 'No se pudo obtener saludo de Rasa';

        return view('saludo', ['saludo' => $saludo]);
    }
}
