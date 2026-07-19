<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadSangreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tipo_sanguineo' => $this->faker->randomElement(['A+', 'O-', 'AB+', 'B-']),
            'volumen_ml' => $this->faker->numberBetween(400, 500),
            'fecha_extraccion' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['Disponible', 'En análisis', 'Descartada']),
            'hospital_id' => $this->faker->numberBetween(1, 3) // Asigna a uno de los 3 hospitales del seeder
        ];
    }
}