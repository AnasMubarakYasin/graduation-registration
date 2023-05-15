<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRegistrarRequest;
use App\Models\Faculty;
use App\Models\Quota;
use App\Models\Registrar;
use App\Notifications\CreatedOrUpdatedRegistrar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{
    public function dashboard_show()
    {
        return view('student.dashboard', [
            'has_quota' => Quota::first_open(),
            'quota' => Quota::stats(),
            'registrar' => $this->get_registrar()?->stats_filled(),
        ]);
    }

    public function data_show(Request $request)
    {
        $data = $this->get_registrar() ?? new Registrar();

        return view('student.data', ['data' => $data, 'faculties' => Faculty::all()]);
    }

    public function file_show(Request $request)
    {
        $data = $this->get_registrar() ?? new Registrar();

        return view('student.file', ['data' => $data]);
    }

    public function profile_show()
    {
        return view('student.profile', []);
    }

    public function notification_show()
    {
        return view('student.notification', []);
    }

    public function about_show()
    {
        return view('student.about', []);
    }

    public function data_store(UpdateRegistrarRequest $request)
    {
        $data = $request->validated();
        // $user = auth()->user();
        $biodata = $this->get_or_create_registrar();
        $data['yoe'] && ($data['doe'] = Carbon::now()->setDate($data['yoe'], 9, 1));
        $biodata->fill($data);
        $biodata->saveQuietly();
        return to_route('student.dashboard.show');
    }
    public function file_store(UpdateRegistrarRequest $request)
    {
        $data = $request->validated();
        // $user = auth()->user();
        $biodata = $this->get_or_create_registrar();
        $biodata->fill($data);
        $biodata->saveQuietly();

        return to_route('student.dashboard.show');
    }
    public function submit()
    {
        $registrar = $this->get_registrar();
        $registrar->check();

        return to_route('student.dashboard.show');
    }
    public function print()
    {
        $registrar = $this->get_registrar();
        $quota = $registrar->quota()->first();

        return view('student.print', ['registrar' => $registrar, 'quota' => $quota]);
    }

    protected function get_registrar()
    {
        return Registrar::get_by_user(auth('student')->user());
    }

    protected function get_or_create_registrar()
    {
        $user = auth()->user();
        $quota = Quota::first_open();
        $registrar = $this->get_registrar();
        if (!$registrar) {
            /** @var Registrar */
            $registrar = new Registrar();
            $registrar->quota_id = $quota->id;
            $registrar->student_id = $user->id;
        }

        return $registrar;
    }
}
