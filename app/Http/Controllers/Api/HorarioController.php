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

use App\Models\Horario;


class HorarioController extends Controller
{

    public function store(Request $request)
    {
        if ($request->hasFile('horario_url')) {
            $archivo = $request->file('horario_url');

            // Subir archivo a Cloudinary
            $uploadedFileUrl = Cloudinary::upload($archivo->getRealPath(), [
                'folder' => 'horarios',
                'public_id' => pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME),
                'overwrite' => true
            ])->getSecurePath();

            // Crear el modelo Horario y guardar la URL pública
            $horarioModel = new Horario();
            $horarioModel->horario_url = $uploadedFileUrl;
            $horarioModel->degree_id = $request->degree_id;

            $horarioModel->save();

            return $horarioModel;
        } else {
            return response()->json(["mensaje" => "error"]);
        }
    }
}
