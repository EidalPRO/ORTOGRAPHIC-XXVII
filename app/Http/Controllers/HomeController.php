<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {


        return view('private.home');
    }

    public function about()
    {
        return view('about');
    }

    public function galeria()
    {
        return view('galeria');
    }

    public function createSala(Request $request)
    {
        try {
            $codigo_sala = $this->generateUniqueCodigoSala();
            $nombre = $request->input('nombre');

            Log:info('Creando sala', [
                'codigo_sala' => $codigo_sala,
                'nombre' => $nombre,
                'user_id' => Auth::id()
            ]);

            $sala = Sala::create([
                'codigo_sala' => $codigo_sala,
                'nombre' => $nombre,
                'user_id' => Auth::id(), // Obtener el ID del usuario autenticado
            ]);

            return response()->json(['success' => true, 'sala' => $sala]);
        } catch (\Exception $e) {
            Log::error('Error al crear sala', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function generateUniqueCodigoSala()
    {
        do {
            $codigo_sala = 'ORT' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        } while (Sala::where('codigo_sala', $codigo_sala)->exists());

        return $codigo_sala;
    }
}
