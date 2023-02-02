<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Link;
use App\Models\User;
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
        ## link seeder
        User::factory()
        ->has(Link::factory()->count(500))
        ->create([
            'name' => 'User',
            'email' => 'user@test.com',
        ]);
    }
}
