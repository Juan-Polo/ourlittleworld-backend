<?php

namespace App\Http\Controllers\Api;

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
            $archivoName = $archivo->getClientOriginalName();
            $archivoName = pathinfo($archivoName, PATHINFO_FILENAME);
            $nameArchivo = str_replace(" ", "_", $archivoName);
            $extension = $archivo->getClientOriginalExtension();
            $picture = date('His') . '-' . $nameArchivo . '-.' . $extension;

            // Guardar la imagen en el disco 'storage'
            $imagePath = $archivo->storeAs('public/archivos/actividades', $picture);

            // Crear el modelo de imagen y guardar la ruta en la base de datos
            $activityModel = new Activity();
            // Asignar la ruta relativa de la imagen al atributo 'image_url'
            $activityModel->actividad_url = 'storage/archivos/actividades/' . $picture;
            $activityModel->titulo = $request->titulo;
            $activityModel->descripcion = $request->descripcion;

            $activityModel->fechaInicio = $request->fechaInicio;

            $activityModel->fechaFin = $request->fechaFin;

            $activityModel->asignatura_id  = $request->asignatura_id;

            $activityModel->save();

            return $activityModel;
        } else {
            return response()->json(["mensaje" => "error"]);
        }






        // $request->validate([
        //     'actividad_url' => 'required|max:255',
        //     'titulo' => 'required|max:255',
        //     'descripcion' => 'required|max:255',
        //     'fechaInicio' => 'required|max:255',
        //     'fechaFin' => 'required|max:255',
        //     'asignatura_id' => 'required|max:255',


        // ]);

        // $activity = Activity::create($request->all());

        // return $activity;
    }


    public function show($id)
    {

        $activity = Activity::with('evidencias')->find($id);
        // $activity = Activity::with('role', 'image')->find($id);
        return $activity;
    }


    // public function edit(Activity $activity)
    // {

    //     $roles = Role::all();
    //     return view('users.edit', compact('user'), ['role' => $roles]);
    // }


    public function update(Request $request, Activity $activity)
    {



        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required|max:255',

        ]);

        $activity->update($request->all());

        return $activity;
    }



    public function destroy(Activity $activity)
    {

        $activity->delete();
        // return redirect()->route('users.index');
        return "Borrado";
    }
}
