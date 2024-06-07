<!DOCTYPE html>
<html>
<head>
    <title>Listado de Cursos</title>
</head>
<body>
    <h1>Listado de Cursos</h1>
    <a href="{{ route('course.create') }}">Crear Nuevo Curso</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Créditos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->credits }}</td>
                    <td>
                        <a href="{{ route('course.edit', $course->id) }}">Editar</a>
                        <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
