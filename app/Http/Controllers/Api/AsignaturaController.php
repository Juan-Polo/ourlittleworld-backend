<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $asignaturas = Asignatura::included()->filter()->sort()->get();
        return $asignaturas;
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'maestro_id' => 'required|max:255',
            'degree_id' => 'required|max:255'

        ]);

        $asignaturas = Asignatura::create($request->all());

        return $asignaturas;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensaje  $notification
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //$notification = Notification::with(['posts.user'])->findOrFail($id);

        $asignatura = Asignatura::included()->with('activities.asignatura.maestro.user.image', 'guias')->findOrFail($id);
        return $asignatura;

        // return 'holaa';
    }


    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'name' => 'required|max:255',
            'maestro_id' => 'required|max:255',
            'degree_id' => 'required|max:255'

        ]);

        $asignatura->update($request->all());

        return $asignatura;
    }


    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return $asignatura;
    }
}
