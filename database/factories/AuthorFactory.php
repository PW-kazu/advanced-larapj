<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Author::class;

    
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'age'=>$this->faker->naumberBetween(1,100),
            'nationality'=>$this->country
        ];
    }
}
