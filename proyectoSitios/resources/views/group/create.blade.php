<!DOCTYPE html>
<html>
<head>
    <title>Crear Grupo</title>
</head>
<body>
    <h1>Crear Nuevo Grupo</h1>
    <form action="{{ route('group.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
