<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 text-gray-800 p-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-red-600">Gestión de sangre</h1>
            <a href="{{ route('inventario.create') }}" class="bg-red-600 text-white px-4 py-2 rounded">+ Registrar</a>
        </div>
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Tipo</th>
                        <th class="py-3 px-4">Hospital </th>
                        <th class="py-3 px-4">Exámenes </th>
                        <th class="py-3 px-4">Estado</th>
                        <th class="py-3 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidades as $unidad)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $unidad->id }}</td>
                        <td class="py-3 px-4 font-bold text-red-500">{{ $unidad->tipo_sanguineo }}</td>
                        <td class="py-3 px-4">{{ $unidad->hospital ? $unidad->hospital->nombre : 'Sin asignar' }}</td>
                        <td class="py-3 px-4">
                            @foreach($unidad->examenes as $examen)
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 rounded">{{ $examen->nombre_examen }}</span>
                            @endforeach
                        </td>
                        <td class="py-3 px-4">{{ $unidad->estado }}</td>
                        <td class="py-3 px-4 flex gap-2">
                            <a href="{{ route('inventario.edit', $unidad->id) }}" class="text-blue-600">Editar</a>
                     <form action="{{ route('inventario.destroy', $unidad->id) }}" method="POST" id="form-eliminar-{{ $unidad->id }}">
    @csrf @method('DELETE')
    <button type="button" onclick="confirmarEliminacion({{ $unidad->id }})" class="text-red-600 hover:underline font-semibold">Eliminar</button>
</form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Paginación -->
        <div class="mt-4">
            {{ $unidades->links() }}
        </div>
    </div>

<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta unidad de sangre será eliminada del sistema.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626', // Rojo de Tailwind
            cancelButtonColor: '#6b7280', // Gris de Tailwind
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-eliminar-' + id).submit();
            }
        })
    }
</script>

</body>
</html>