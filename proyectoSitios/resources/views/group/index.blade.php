<!DOCTYPE html>
<html>
<head>
    <title>Listado de Grupos</title>
</head>
<body>
    <h1>Listado de Grupos</h1>
    <a href="{{ route('group.create') }}">Crear Nuevo Grupo</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>
                        <a href="{{ route('group.edit', $group->id) }}">Editar</a>
                        <form action="{{ route('group.destroy', $group->id) }}" method="POST" style="display:inline;">
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
