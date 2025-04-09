<?php

use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\AsignaturaController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\DegreeController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\MensajeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EvidenciaController;
use App\Http\Controllers\Api\HorarioController;
use App\Models\Image;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('users', UserController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('chats', ChatController::class);
Route::resource('mensajes', MensajeController::class);
Route::resource('degrees', DegreeController::class);
Route::get('getImages', [DegreeController::class, 'getImages'])->name('degrees.getImages');
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('activities', ActivityController::class);
Route::resource('evidencias', EvidenciaController::class);
Route::resource('horarios', HorarioController::class);



Route::resource('roles', RoleController::class);


// Route::resource('images', ImageController::class);
Route::get('/get-image/{id}', [ImageController::class, 'getImage']);


Route::post('upload', [ImageController::class, 'uploadImage'])->name('images.upload');


Route::get('/edit-image/{id}', [ImageController::class, 'edit'])->name('edit-image');

Route::delete('/delete-file/{image}', [ImageController::class, 'deleteFile'])->name('delete-file');
Route::put('/update-image/{id}', [ImageController::class, 'updateImage'])->name('update-image');




Route::get('/test-cloudinary', function () {
    return [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        'api_key' => env('CLOUDINARY_API_KEY'),
        'api_secret' => env('CLOUDINARY_API_SECRET'),
    ];
});
