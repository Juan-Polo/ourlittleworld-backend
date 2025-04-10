<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DegreeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = Degree::included()->filter()->sort()->get();
        return $degrees;
    }



    public function getImages()
    {
        $images = Cloudinary::getResources([
            'type' => 'upload',
            'prefix' => 'degrees/',  // La carpeta 'degrees' en Cloudinary
            'resource_type' => 'image',
        ]);

        // Extrae las URLs de las imágenes
        $imageUrls = array_map(function ($image) {
            return $image['secure_url'];
        }, $images['resources']);

        return response()->json($imageUrls);
    }




    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|max:255',
            'school_day' => 'required|max:255',
            'students' => 'required|max:255',
            'image' => 'required|max:255'

        ]);

        $degree = Degree::create($request->all());

        return $degree;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensaje  $notification
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {

        $maestros = Maestro::with('user')->get();


        $degree = Degree::included()->with('asignaturas.maestro.user', 'horario')->findOrFail($id);
        return [
            'degree' => $degree,
            'maestros' => $maestros
        ];

        // $degree = Degree::included()->with('asignaturas.maestro.user')->findOrFail($id);
        // return $degree;
    }





    public function update(Request $request, Degree $degree)
    {



        $request->validate([
            'name' => 'required|max:255',
            'school_day' => 'required|max:255',
            'students' => 'required|max:255',

        ]);

        $degree->update($request->all());

        return $degree;
    }



    public function destroy(Degree $degree)
    {

        $degree->delete();
        return $degree;
    }
}
