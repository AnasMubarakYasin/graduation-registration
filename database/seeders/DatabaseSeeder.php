<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Student;
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

        Admin::factory()->create([
            'name' => 'admin',
            'role' => 'administrator',
            'email' => 'admin@host.local',
            'password' => 'admin',
        ]);
        
        Student::factory()->create([
            'name' => 'student',
            'nim' => '00000000000',
            'email' => 'student@host.local',
            'password' => 'student',
        ]);
    }
}
