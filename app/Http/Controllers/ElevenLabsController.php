<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ElevenLabsController extends Controller
{
    public function convertirTexto(Request $request)
    {
        $texto = $request->input('texto');

        if (!$texto) {
            return response()->json(['error' => 'Texto requerido'], 400);
        }

        try {
            $apiKey = config('services.elevenlabs.api_key');
            $voiceId = config('services.elevenlabs.voice_id');

            $response = Http::withHeaders([
                'xi-api-key' => $apiKey,
                'Content-Type' => 'application/json'
            ])->post("https://api.elevenlabs.io/v1/text-to-speech/$voiceId", [
                "text" => "<speak><lang xml:lang='es-MX'>$texto</lang></speak>",
                "model_id" => "eleven_multilingual_v2",
                "voice_settings" => [
                    "stability" => 0.75,         // 75% más estable
                    "similarity_boost" => 0.75,  // 75% de similitud con la voz original
                    "style" => 0.15   
                ]
            ]);

            if ($response->failed()) {
                return response()->json([
                    'error' => 'Error al generar el audio',
                    'details' => $response->json()
                ], $response->status());
            }

            return response($response->body(), 200)->header('Content-Type', 'audio/mpeg');
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Excepción al comunicarse con ElevenLabs',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
