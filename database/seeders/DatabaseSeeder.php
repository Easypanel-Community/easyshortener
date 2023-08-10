<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Link;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ## link seeder
        if(config('app.env') == 'production'){
            $userRole = Role::create(['name' => 'user']);
            $adminRole = Role::create(['name' => 'admin']);
        } else{
            User::factory()
            ->has(Link::factory()->count(500))
            ->create([
                'name' => 'User',
                'email' => 'user@test.com',
                'role_id' =>  '2',
            ]);

            $userRole = Role::create(['name' => 'user']);
            $adminRole = Role::create(['name' => 'admin']);
        }
    }
}
