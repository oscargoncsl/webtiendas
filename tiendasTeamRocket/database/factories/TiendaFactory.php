<?php

namespace Database\Factories;

use App\Models\Tienda;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TiendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tienda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'ubicacion' => $this->faker->address,
            'id_comerciante' =>User::all()->random()->id,

        ];
    }
}
