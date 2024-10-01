<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'edad' => rand(18, 65),
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'correo' => $this->faker->unique()->safeEmail(),
            'nacionalidad' => $this->faker->country(),
        ];
    }
}