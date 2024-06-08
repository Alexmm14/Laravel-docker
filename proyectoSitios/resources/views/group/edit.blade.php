<!DOCTYPE html>
<html>
<head>
    <title>Editar Grupo</title>
</head>
<body>
    <h1>Editar Grupo</h1>
    <form action="{{ route('group.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ $group->name }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
