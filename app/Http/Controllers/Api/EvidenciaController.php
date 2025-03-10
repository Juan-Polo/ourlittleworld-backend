<?php

namespace App\Http\Controllers\Api;

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
            $archivoName = $archivo->getClientOriginalName();
            $archivoName = pathinfo($archivoName, PATHINFO_FILENAME);
            $nameArchivo = str_replace(" ", "_", $archivoName);
            $extension = $archivo->getClientOriginalExtension();
            $picture = date('His') . '-' . $nameArchivo . '-' . $extension;

            // Guardar la imagen en el disco 'storage'
            $ArchivoPath = $archivo->storeAs('public/archivos/evidencias', $picture);

            // Crear el modelo de imagen y guardar la ruta en la base de datos
            $EvidenciaModel = new Evidencia();
            // Asignar la ruta relativa de la imagen al atributo 'image_url'
            $EvidenciaModel->evidencia_url = 'storage/archivos/evidencias/' . $picture;
            $EvidenciaModel->fechaSubida = $request->fechaSubida;
            $EvidenciaModel->activity_id  = $request->activity_id;

            $EvidenciaModel->save();

            return $EvidenciaModel;
        } else {
            return response()->json(["mensaje" => "error"]);
        }
    }
}
