<?php

namespace App\Http\Controllers\Api;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {



        // $activities = Activity::included()->filter()->sort();
        $activities = Activity::all();
        // ->with('image', 'role')->get();

        return $activities;
    }


    // public function create()
    // {

    //     $roles = Role::all();
    //     return view('users.create', ['role' => $roles]);
    // }

    public function store(Request $request)
    {
        if ($request->hasFile('actividad_url')) {
            $archivo = $request->file('actividad_url');

            // Subir archivo a Cloudinary
            $uploadedFileUrl = Cloudinary::upload($archivo->getRealPath(), [
                'folder' => 'actividades',
                'public_id' => pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME),
                'overwrite' => true
            ])->getSecurePath();

            // Crear modelo y guardar la URL de Cloudinary
            $activityModel = new Activity();
            $activityModel->actividad_url = $uploadedFileUrl;
            $activityModel->titulo = $request->titulo;
            $activityModel->descripcion = $request->descripcion;
            $activityModel->fechaInicio = $request->fechaInicio;
            $activityModel->fechaFin = $request->fechaFin;
            $activityModel->asignatura_id = $request->asignatura_id;

            $activityModel->save();

            return $activityModel;
        } else {
            return response()->json(["mensaje" => "error"]);
        }
    }


    public function show($id)
    {

        $activity = Activity::with('evidencias')->find($id);
        // $activity = Activity::with('role', 'image')->find($id);
        return $activity;
    }







    public function destroy(Activity $activity)
    {

        $activity->delete();
        // return redirect()->route('users.index');
        return "Borrado";
    }
}
