<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\Administrator;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\Student;

class AdministratorController extends Controller
{
    public function dashboard_show()
    {
        $quota = Quota::stats();
        $registrar = Registrar::stats_status();

        return view('admin.dashboard', ['quota' => $quota, 'registrar' => $registrar]);
    }

    public function profile_show()
    {
        return view('admin.profile');
    }

    public function notification_show()
    {
        return view('admin.notification');
    }

    public function empty_show()
    {
        return view('admin.empty');
    }

    public function quota_index()
    {
        return view('admin.quota.index');
    }
    public function quota_create()
    {
        return view('admin.quota.create');
    }
    public function quota_edit(Quota $quota)
    {
        return view('admin.quota.edit', ['quota' => $quota]);
    }

    public function registrar_index()
    {
        return view('admin.registrar.index');
    }
    public function registrar_create()
    {
        return view('admin.registrar.create');
    }
    public function registrar_edit(Registrar $registrar)
    {
        return view('admin.registrar.edit', ['registrar' => $registrar]);
    }
    public function registrar_validate(Registrar $registrar)
    {
        return view('admin.registrar.validate', ['registrar' => $registrar]);
    }

    public function faculty_show()
    {
        return view('admin.faculty');
    }

    public function student_index()
    {
        return view('admin.student.index');
    }
    public function student_create()
    {
        return view('admin.student.create');
    }
    public function student_edit(Student $student)
    {
        return view('admin.student.edit', ['student' => $student]);
    }
}
