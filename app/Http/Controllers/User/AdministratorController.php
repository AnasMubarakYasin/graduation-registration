<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\Administrator;
use App\Models\Quota;
use App\Models\Registrar;

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
        return view('admin.profile', []);
    }

    public function notification_show()
    {
        return view('admin.notification', []);
    }

    public function empty_show()
    {
        return view('admin.empty', []);
    }

    public function registrar_validate_show()
    {
        return view('admin.registrar.validate', ['data' => Registrar::all()]);
    }

    public function quota_list_show()
    {
        return view('admin.quota.list', []);
    }

    public function quota_create_show()
    {
        return view('admin.quota.create', []);
    }

    public function quota_edit_show()
    {
        return view('admin.quota.edit', []);
    }

    public function faculty_show()
    {
        return view('admin.faculty', []);
    }

    public function student_show()
    {
        return view('admin.student', []);
    }
}
