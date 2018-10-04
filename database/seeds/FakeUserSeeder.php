<?php

use App\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class FakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a test account - will add user roles at a later date
        User::create([
            'username' => 'admin',
            'name' => 'Admin Guy',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
            'title' => 'Front End',
            'skill_level' => 'Advanced',
            'role' => 'admin',
            'remember_token' => str_random(10)
        ]);

        factory(User::class, 25)->create();
    }
}
