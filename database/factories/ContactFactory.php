<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //$faker = Faker::create();
        return [
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'email'=>$this->faker->email(),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
            'company_id'=>Company::pluck('id')->random()
            // 'created_at'=>now(),
            // 'updated_at'=>now()
        ];
    }
}
