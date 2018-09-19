<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class FakeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Project::class, 10)->create();
    }
}
