<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

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
        \App\Models\User::factory()->create([
            'id' => Uuid::uuid4()->getHex(),
            'name' => 'Muhammad Ashari',
            'username' => 'admin',
            'password' => Hash::make('password')
        ]);
    }
}
