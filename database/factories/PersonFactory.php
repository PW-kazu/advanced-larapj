<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    protected $model = Person::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->numberBetween(1,100),
        ];
    }
}
