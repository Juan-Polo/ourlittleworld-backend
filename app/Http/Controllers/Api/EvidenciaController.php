<?php

namespace App\Http\Controllers\Api;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Evidencia;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EvidenciaController extends Controller
{
    public function index()
    {
        $evidencias = Evidencia::all();


        return $evidencias;
    }


    public function store(Request $request)
    {
        if ($request->hasFile('evidencia_url')) {
            $archivo = $request->file('evidencia_url');

            // Subir archivo a Cloudinary
            $uploadedFileUrl = Cloudinary::upload($archivo->getRealPath(), [
                'folder' => 'evidencias',
                'public_id' => pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME),
                'overwrite' => true
            ])->getSecurePath();

            // Crear el modelo y guardar la URL pública
            $EvidenciaModel = new Evidencia();
            $EvidenciaModel->evidencia_url = $uploadedFileUrl;
            $EvidenciaModel->fechaSubida = $request->fechaSubida;
            $EvidenciaModel->activity_id = $request->activity_id;

            $EvidenciaModel->save();

            return $EvidenciaModel;
        } else {
            return response()->json(["mensaje" => "error"]);
        }
    }
}
