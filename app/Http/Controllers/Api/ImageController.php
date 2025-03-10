<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Notification;
use App\Models\Mensaje;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class ImageController extends Controller
{



    public function getImage($id)
    {
        $imageModel = Image::find($id);


        return response()->json($imageModel);
    }




    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = $image->getClientOriginalName();
            $imageName = pathinfo($imageName, PATHINFO_FILENAME);
            $nameImage = str_replace(" ", "_", $imageName);
            $extension = $image->getClientOriginalExtension();
            $picture = date('His') . '-' . $nameImage . '-' . $extension;

            // Guardar la imagen en el disco 'storage'
            $imagePath = $image->storeAs('public/avatar', $picture);

            // Crear el modelo de imagen y guardar la ruta en la base de datos
            $imageModel = new Image();
            // Asignar la ruta relativa de la imagen al atributo 'image_url'
            $imageModel->image_url = 'storage/avatar/' . $picture;
            $imageModel->user_id = $request->user_id;
            $imageModel->save();

            return $imageModel;
        } else {
            return response()->json(["mensaje" => "error"]);
        }
    }









    public function edit($id)
    {
        // Aquí puedes obtener la imagen con el ID proporcionado y pasarla a la vista del formulario de actualización
        $image = Image::find($id)->with('user')->find($id);



        // return view('avatar.edit', compact('image'));

        return $image;
    }





    public function updateImage(Request $request, $id)
    {
        // Obtener el modelo de imagen existente


        $imageModel = Image::find($id);


        // $url = $imageModel->image_url;

        // dd($url);

        $url = str_replace('storage', 'public', $imageModel->image_url);

        // return $url;


        if ($imageModel) {
            // Verificar si se proporciona una nueva imagen


            if ($request->hasFile('image_url')) {


                // Eliminar la imagen existente del almacenamiento
                if (Storage::exists($url)) {
                    Storage::delete($url);
                }
                // Procesar la nueva imagen
                $image = $request->file('image_url');
                $imageName = $image->getClientOriginalName();
                $imageName = pathinfo($imageName, PATHINFO_FILENAME);
                $nameImage = str_replace(" ", "_", $imageName);
                $extension = $image->getClientOriginalExtension();
                $picture = date('His') . '-' . $nameImage . '-' . $extension;

                // Guardar la nueva imagen en el almacenamiento
                $imagePath = $image->storeAs('public/avatar', $picture);

                // Actualizar la ruta de la imagen en el modelo de imagen existente
                $imageModel->image_url = 'storage/avatar/' . $picture;
            }

            // Guardar los cambios en el modelo de imagen existente
            $imageModel->save();

            // Retornar la respuesta de éxito
            return $imageModel;
        } else {
            // Retornar un mensaje de error si la imagen no se encuentra en la base de datos
            return response()->json(["mensaje" => "La imagen no se encontró en la base de datos"], 404);
        }
    }







    public function deleteFile(Image $image)
    {

        $url = str_replace('storage', 'public', $image->image_url);

        Storage::delete($url);

        $image->delete();

        // if (Storage::exists($avatar)) {
        //     Storage::delete($avatar);
        //     return "El archivo $avatar ha sido eliminado exitosamente.";
        // } else {
        //     return "El archivo $avatar no existe.";
        // }
    }



    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'image_url' => 'required|image|max:2048',
    //         'user_id' => 'required|max:255',


    //     ]);

    //     $images = Image::create($request->all());

    //     return $images;
    // }



    public function show($id)
    {
        $image = Image::included()->findOrFail($id);
        return $image;
    }


    public function update()
    {
        return view('avatar.edit');
    }


    // public function destroy(Image $image)
    // {
    //     $image->delete();
    //     return $image;
    // }























}
