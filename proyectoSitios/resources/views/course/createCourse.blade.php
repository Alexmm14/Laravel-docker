<!DOCTYPE html>
<html>
<head>
    <title>Crear Curso</title>
</head>
<body>
    <h1>Crear Nuevo Curso</h1>
    <form action="{{ route('course.store') }}" method="POST">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" required>
        <br>
        <label for="credits">Créditos:</label>
        <input type="number" name="credits" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
