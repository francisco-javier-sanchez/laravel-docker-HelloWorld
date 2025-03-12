<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       \app\Models\User::factory(10)->create();

       \app\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
	    'password' =>bcrypt('holamundo1234')
        ]);
    }
}
