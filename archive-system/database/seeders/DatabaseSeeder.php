<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Type;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Type::create(['name' => 'Admin']);
        Type::create(['name' => 'ProjectOwner']);
        Type::create(['name' => 'User']);

        User::create(['name' => 'Administrator', 'email' => 'admin@admin.com', 'password' => 'hej', 'type_id' => 3]);


    }
}
