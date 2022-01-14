<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'descripcion' => $this->faker->sentence,
            'precio' => $this->faker->randomDigit,
            'imagen' =>$this->faker->image('public/images/productos',640,480, null, false),
        ];
    }
}
