<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//factoris es para hacer testing a las base de datos y verificar la migraciones--
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'titulo'=>$this->faker->sentence(5),
            'descripcion'=>$this->faker->sentence(20),
            'imagen'=> $this->faker->uuid() . '.jpg',
            'user_id'=> $this->faker->randomElement([1,2,3])

        ];
    }
}
