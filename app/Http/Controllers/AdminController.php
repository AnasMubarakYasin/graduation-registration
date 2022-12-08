<?php

namespace App\Http\Controllers;

use App\Feature\Main;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\QuotaCreateRequest;
use App\Models\Quota;
use App\Models\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    public function login_show()
    {
        return view('admin.login');
    }
    public function login_perfom(AdminLoginRequest $request)
    {
        $data = $request->validated();
        if (auth('admin')->attempt(Arr::only($data, ['name', 'password']), isset($data['remember']))) {
            session()->regenerate();
            return to_route('admin.dashboard.show');
        } else {
            return back()->withErrors(['name' => ['username mismatch'], 'password' => ['password mismatch']]);
        }
    }
    public function logout_perfom()
    {
        auth('admin')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return to_route('admin.login.show');
    }

    public function dashboard_show()
    {
        $quota = Main::single()->get_open_quota();
        $registrar = Main::single()->stats_registrar($quota);
        return view('admin.dashboard', ['user' => $this->get_user(), 'quota' => $quota, 'registrar' => $registrar]);
    }
    public function profile_show()
    {
        return view('admin.profile', ['user' => $this->get_user()]);
    }

    public function registrar_validate_show()
    {
        return view('admin.registrar.validate', ['user' => $this->get_user(), 'data' => Registrar::all()]);
    }
    public function quota_list_show()
    {
        return view('admin.quota.list', ['user' => $this->get_user()]);
    }
    public function quota_create_show()
    {
        return view('admin.quota.create', ['user' => $this->get_user()]);
    }
    public function quota_edit_show()
    {
        return view('admin.quota.edit', ['user' => $this->get_user()]);
    }
    public function faculty_show()
    {
        return view('admin.faculty', ['user' => $this->get_user()]);
    }
    public function student_show()
    {
        return view('admin.student', ['user' => $this->get_user()]);
    }

    protected function get_user()
    {
        return auth('admin')->user();
    }
}
