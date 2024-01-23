<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create(); // Crée deux utilisateurs normaux
    
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@carhub.com',
            'is_admin' => true,
        ]);   //user admin
    }
}
