<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Website::factory(5)->create();
        \App\Models\Post::factory(15)->create();
        foreach (Website::all() as $website) {
            $website->subscribers()->attach(User::query()->limit(rand(3, 10))->inRandomOrder()->get());
        }
    }
}
