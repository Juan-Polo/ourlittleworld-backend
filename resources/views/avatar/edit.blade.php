<!-- resources/views/avatar/edit.blade.php -->

<form action="{{ route('update-image', ['id' => $image->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Campo para cargar la nueva imagen -->
    <div class="form-group">
        <label for="image_url">{{ $image->image_url }}</label>
        <input type="file" name="image_url" id="image_url" class="form-control">

        <label for="user_id">User <br> <input type="text" name="user_id" value="{{ $image->user->name }}"> </label>

    </div>

    <!-- Botón de enviar el formulario -->
    <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
</form>
