<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name,
            'foto'=>$this->faker->name,
            'correo'=>$this->faker->unique()->safeEmail,
            'semestre'=>$this->faker->name,
            'edad'=>$this->faker->name,

        ];
    }
}
