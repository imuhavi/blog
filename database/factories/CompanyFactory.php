<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->company(),
            'website'=>$this->faker->domainName(),
            'email'=>$this->faker->email(),
            'address'=>$this->faker->address(),
            //'user_id'=> User::factory()
            //'user_id' => User::pluck('id')->random()
        ];
    }
}
