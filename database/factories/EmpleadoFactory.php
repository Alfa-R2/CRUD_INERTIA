<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre"=>$this->faker->name(),
            "email"=> $this->faker->email(),
            "telefono"=> $this->faker->e164PhoneNumber(),
            "id_departamento"=> $this->faker->numberBetween(1,6),
            
        ];
    }
}
