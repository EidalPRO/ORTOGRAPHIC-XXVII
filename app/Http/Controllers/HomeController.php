<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Reactivo;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('welcome');
    // }

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
    public function getSalas()
    {
        $user = Auth::user();

        // Obtener las salas a las que el usuario pertenece desde la tabla sala_usuario
        $salas = DB::table('sala_usuario')
            ->join('sala', 'sala_usuario.sala_id', '=', 'sala.id_sala')
            ->where('sala_usuario.user_id', $user->id)
            ->select('sala.*')
            ->get();

        // Obtener el rol del usuario
        $rol = $user->roles_id_roles;
        $esPremium = $user->esPremium;

        return response()->json([
            'success' => true,
            'salas' => $salas,
            'rol' => $rol,
            'esPremium' => $esPremium,
            'user' => $user,
        ]);
    }

    public function createSala(Request $request)
    {
        try {
            $codigo_sala = $this->generateUniqueCodigoSala();
            $nombre = $request->input('nombre');

            Log::info('Creando sala', [
                'codigo_sala' => $codigo_sala,
                'nombre' => $nombre,
                'user_id' => Auth::id()
            ]);

            $sala = Sala::create([
                'codigo_sala' => $codigo_sala,
                'nombre' => $nombre,
                'user_id' => Auth::id(),
            ]);
            // Verifica que la sala tenga el ID
            Log::info('Sala creada:', ['sala_id' => $sala->id]);

            $reactivos = Reactivo::inRandomOrder()->limit(15)->get();

            $evaluacion = Evaluacion::create([
                'tipo' => 'Evaluación Diagnóstica',
                'sala_id' => $sala->id_sala,
                'reactivos' => $reactivos->pluck('id_reactivos')->toJson(),
            ]);

            return response()->json([
                'success' => true,
                'sala' => $sala,
                'evaluacion' => $evaluacion
            ]);
        } catch (\Exception $e) {
            // Registrar el error
            Log::error('Error al crear sala', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    private function generateUniqueCodigoSala()
    {
        do {
            $codigo_sala = 'ORT' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        } while (Sala::where('codigo_sala', $codigo_sala)->exists());

        return $codigo_sala;
    }



    public function agregarSala(Request $request)
    {
        $codigo = $request->input('codigo');
        $user_id = Auth::id();

        $sala = Sala::where('codigo_sala', $codigo)->first();

        if ($sala) {
            $exists = DB::table('sala_usuario')
                ->where('sala_id', $sala->id_sala)
                ->where('user_id', $user_id)
                ->exists();

            if (!$exists) {
                DB::table('sala_usuario')->insert([
                    'sala_id' => $sala->id_sala,
                    'user_id' => $user_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                return response()->json(['success' => true, 'message' => 'Sala agregada exitosamente']);
            } else {
                return response()->json(['success' => false, 'message' => 'El usuario ya pertenece a la sala']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'La sala no existe']);
        }
    }

    public function salirSala($salaId)
    {
        $userId = Auth::id();

        try {
            // Eliminar registros del usuario en las tablas relacionadas
            DB::table('sala_usuario')->where('sala_id', $salaId)->where('user_id', $userId)->delete();
            DB::table('sala_minijuegos_usuario')->where('sala_id', $salaId)->where('user_id', $userId)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
