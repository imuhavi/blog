<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(ContactTableSeeder::class);
        //$this->call(CompanyTableSeeder::class);
        \App\Models\User::factory()->count(5)->create()->each(function ($user) {
            Company::factory()->has(
              Contact::factory()->count(5)->state(function ($attributes, Company $company) {
                return ['user_id' => $company->user_id];
              })
            )
            ->count(10)->create([
              'user_id' => $user->id
            ]);
          });
        //\App\Models\Contact::factory(50)->create();
       // \App\Models\Company::factory()->hasContacts(5)->count(50)->create();

    }
}
