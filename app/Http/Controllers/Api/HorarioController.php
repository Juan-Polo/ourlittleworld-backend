<?php



namespace App\Http\Controllers\Api;

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
            $archivoName = $archivo->getClientOriginalName();
            $archivoName = pathinfo($archivoName, PATHINFO_FILENAME);
            $nameArchivo = str_replace(" ", "_", $archivoName);
            $extension = $archivo->getClientOriginalExtension();
            $picture = date('His') . '-' . $nameArchivo . '-.' . $extension;

            // Guardar la imagen en el disco 'storage'
            $imagePath = $archivo->storeAs('public/horarios', $picture);

            // Crear el modelo de imagen y guardar la ruta en la base de datos
            $activityModel = new Horario();
            // Asignar la ruta relativa de la imagen al atributo 'image_url'
            $activityModel->horario_url = 'storage/horarios/' . $picture;


            $activityModel->degree_id  = $request->degree_id;

            $activityModel->save();

            return $activityModel;
        } else {
            return response()->json(["mensaje" => "error"]);
        }
    }
}
