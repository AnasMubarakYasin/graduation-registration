<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Administrator;
use App\Models\Faculty;
use App\Models\Operator;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\RegistrarStatus;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        $faculty_st = Faculty::factory()->create([
            'name' => 'Sains dan Teknologi',
            'departments' => ['Sistem Informasi', 'Teknik Informatika'],
        ]);
        $faculty_bi = Faculty::factory()->create([
            'name' => 'Ekonomi dan Bisnis Islam',
            'departments' => ['Ekonomi Syariah', 'Perbankan Syariah'],
        ]);

        Administrator::factory()->create([
            'name' => 'super',
            'role' => 'super_administrator',
            'email' => 'super@host.local',
            'password' => 'super',
        ]);
        Administrator::factory()->create([
            'name' => 'admin',
            'role' => 'administrator',
            'email' => 'admin@host.local',
            'password' => 'admin',
        ]);
        Operator::factory()->create([
            'name' => 'faculty',
            'department' => 'faculty',
            'faculty' => $faculty_st->name,
            'email' => 'faculty@host.local',
            'password' => 'faculty',
        ]);
        Operator::factory()->create([
            'name' => 'academic',
            'department' => 'academic',
            'email' => 'academic@host.local',
            'password' => 'academic',
        ]);
        Student::factory()->create([
            'name' => 'student',
            'nim' => '00000000000',
            'email' => 'student@host.local',
            'password' => 'student',
        ]);

        $quota = Quota::factory()->create([
            'quota' => 90
        ]);
        Registrar::factory()
            ->count(100)
            ->state(new Sequence(
                ['status' => RegistrarStatus::Validate->value],
                ['status' => RegistrarStatus::Revision->value],
                ['status' => RegistrarStatus::Revalidate->value],
                ['status' => RegistrarStatus::Validated->value],
            ))
            ->state(new Sequence(
                ['faculty' => $faculty_st->name, 'study_program' => 'Sistem Informasi'],
                ['faculty' => $faculty_st->name, 'study_program' => 'Teknik Informatika'],
                ['faculty' => $faculty_bi->name, 'study_program' => 'Ekonomi Syariah'],
                ['faculty' => $faculty_bi->name, 'study_program' => 'Perbankan Syariah'],
            ))
            ->for(Student::factory())
            ->create([
                'quota_id' => $quota->id,
            ]);
    }
}
