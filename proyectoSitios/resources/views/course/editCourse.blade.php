<!DOCTYPE html>
<html>
<head>
    <title>Editar Curso</title>
</head>
<body>
    <h1>Editar Curso</h1>
    <form action="{{ route('course.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" name="title" value="{{ $course->title }}" required>
        <br>
        <label for="credits">Créditos:</label>
        <input type="number" name="credits" value="{{ $course->credits }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
