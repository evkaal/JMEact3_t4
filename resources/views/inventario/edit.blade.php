<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Unidad</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow border-t-4 border-blue-600">
        <h2 class="text-2xl font-bold mb-4">Editar Unidad #{{ $unidad->id }}</h2>
        <form action="{{ route('inventario.update', $unidad->id) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="mb-4">
                <label class="block font-bold mb-2">Tipo Sanguíneo</label>
                <select name="tipo_sanguineo" class="w-full border p-2 rounded" required>
                    <option value="A+" {{ $unidad->tipo_sanguineo == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ $unidad->tipo_sanguineo == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ $unidad->tipo_sanguineo == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ $unidad->tipo_sanguineo == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="O+" {{ $unidad->tipo_sanguineo == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ $unidad->tipo_sanguineo == 'O-' ? 'selected' : '' }}>O-</option>
                    <option value="AB+" {{ $unidad->tipo_sanguineo == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ $unidad->tipo_sanguineo == 'AB-' ? 'selected' : '' }}>AB-</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Hospital (Destino)</label>
                <select name="hospital_id" class="w-full border p-2 rounded">
                    <option value="">Sin asignar</option>
                    @foreach($hospitales as $hospital)
                        <option value="{{ $hospital->id }}" {{ $unidad->hospital_id == $hospital->id ? 'selected' : '' }}>
                            {{ $hospital->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Exámenes Aplicados</label>
                @foreach($examenes as $examen)
                    <label class="mr-4">
                        <input type="checkbox" name="examenes[]" value="{{ $examen->id }}" 
                        {{ $unidad->examenes->contains($examen->id) ? 'checked' : '' }}> 
                        {{ $examen->nombre_examen }}
                    </label>
                @endforeach
            </div>

            <div class="mb-6">
                <label class="block font-bold mb-2">Estado</label>
                <select name="estado" class="w-full border p-2 rounded" required>
                    <option value="Disponible" {{ $unidad->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="En análisis" {{ $unidad->estado == 'En análisis' ? 'selected' : '' }}>En análisis</option>
                    <option value="Descartada" {{ $unidad->estado == 'Descartada' ? 'selected' : '' }}>Descartada</option>
                </select>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('inventario.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancelar</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
            </div>
        </form>
    </div>
</body>
</html>