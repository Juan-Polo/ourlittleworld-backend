<?php

namespace App\Http\Controllers\Api;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Notification;
use App\Models\Mensaje;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;





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

            // Subir a Cloudinary
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), [
                'folder' => 'avatar'
            ])->getSecurePath();

            // Crear el modelo de imagen y guardar la URL segura
            $imageModel = new Image();
            $imageModel->image_url = $uploadedFileUrl;
            $imageModel->user_id = $request->user_id;
            $imageModel->save();

            return $imageModel;
        } else {
            return response()->json(["mensaje" => "error"]);
        }
    }









    public function updateImage(Request $request, $id)
    {
        $imageModel = Image::find($id);

        if ($imageModel) {
            if ($request->hasFile('image_url')) {

                // 🔥 Eliminar imagen anterior de Cloudinary
                if ($imageModel->image_url) {
                    // Extraer el public_id desde la URL
                    $urlPath = parse_url($imageModel->image_url, PHP_URL_PATH);
                    $pathParts = explode('/', $urlPath);
                    $filename = end($pathParts); // nombre.ext
                    $publicId = 'avatar/' . pathinfo($filename, PATHINFO_FILENAME); // sin extensión

                    Cloudinary::destroy($publicId);
                }

                // 🚀 Subir nueva imagen
                $image = $request->file('image_url');
                $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'avatar'
                ])->getSecurePath();

                // 💾 Actualizar modelo
                $imageModel->image_url = $uploadedFileUrl;
            }

            $imageModel->save();

            return $imageModel;
        } else {
            return response()->json(["mensaje" => "La imagen no se encontró en la base de datos"], 404);
        }
    }
}
