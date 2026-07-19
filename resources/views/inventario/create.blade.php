<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Unidad</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow border-t-4 border-red-600">
        <h2 class="text-2xl font-bold mb-6">Registrar Nueva Unidad</h2>
        <form action="{{ route('inventario.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block font-bold mb-2">Tipo Sanguíneo</label>
                <select name="tipo_sanguineo" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona...</option>
                    <option value="A+">A+</option><option value="A-">A-</option>
                    <option value="B+">B+</option><option value="B-">B-</option>
                    <option value="O+">O+</option><option value="O-">O-</option>
                    <option value="AB+">AB+</option><option value="AB-">AB-</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Volumen (ml)</label>
                <input type="number" name="volumen_ml" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Fecha de Extracción</label>
                <input type="date" name="fecha_extraccion" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Hospital (Destino)</label>
                <select name="hospital_id" class="w-full border p-2 rounded">
                    <option value="">Sin asignar</option>
                    @foreach($hospitales as $hospital)
                        <option value="{{ $hospital->id }}">{{ $hospital->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Exámenes Aplicados</label>
                @foreach($examenes as $examen)
                    <label class="mr-4">
                        <input type="checkbox" name="examenes[]" value="{{ $examen->id }}"> {{ $examen->nombre_examen }}
                    </label>
                @endforeach
            </div>

            <div class="mb-6">
                <label class="block font-bold mb-2">Estado</label>
                <select name="estado" class="w-full border p-2 rounded" required>
                    <option value="Disponible">Disponible</option>
                    <option value="En análisis">En análisis</option>
                    <option value="Descartada">Descartada</option>
                </select>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('inventario.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancelar</a>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>