<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{

     protected $models = Author::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(1,100),
            'nationality' =>$this->faker->country
        ];
    }
}
