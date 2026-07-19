<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Hospital;
use App\Models\Examen;
use App\Models\UnidadSangre;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear 3 Hospitales
        Hospital::create(['nombre' => 'Hospital General']);
        Hospital::create(['nombre' => 'Cruz Roja']);
        Hospital::create(['nombre' => 'Clínica Especialidades']);

        // 2. Crear 2 Exámenes de Laboratorio
        $examen1 = Examen::create(['nombre_examen' => 'Prueba VIH']);
        $examen2 = Examen::create(['nombre_examen' => 'Prueba Hepatitis']);

        // 3. Crear 20 Unidades de Sangre con el Factory
        UnidadSangre::factory(20)->create()->each(function ($unidad) use ($examen1, $examen2) {
            // Asignar exámenes aleatorios a cada unidad (Tabla Pivote)
            $unidad->examenes()->attach([$examen1->id, $examen2->id]);
        });
    }
}