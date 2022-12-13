<?php

namespace App\Http\Controllers\User;

use App\Feature\Main;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRegistrarRequest;
use App\Models\Quota;
use App\Models\Registrar;
use App\Notifications\CreatedOrUpdatedRegistrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function dashboard_show()
    {
        return view('student.dashboard', [
            'user' => $this->get_user(),
            'has_quota' => Quota::get_first_open(),
            'quota' => Quota::stats(),
            'registrar' => $this->get_registrar()?->stats_filled(),
        ]);
    }
    public function biodata_show(Request $request)
    {
        $data = $this->get_registrar() ?? new Registrar();
        return view('student.biodata', ['user' => $this->get_user(), 'data' => $data]);
    }
    public function file_show(Request $request)
    {
        $data = $this->get_registrar() ?? new Registrar();
        return view('student.file', ['user' => $this->get_user(), 'data' => $data]);
    }
    public function profile_show()
    {
        return view('student.profile', ['user' => $this->get_user()]);
    }
    public function notification_show()
    {
        return view('student.notification', ['user' => $this->get_user()]);
    }
    public function about_show()
    {
        return view('student.about', ['user' => $this->get_user()]);
    }

    public function biodata_store(UpdateRegistrarRequest $request)
    {
        $data = $request->validated();
        $user = $this->get_user();
        $biodata = $this->get_or_create_registrar();
        $biodata->fill($data);
        $biodata->save();
        Notification::sendNow($user, new CreatedOrUpdatedRegistrar(asset('logo.svg'), 'Biodata Updated', 'student.data.show', $biodata));
        return to_route('student.data.show');
    }
    public function file_store(UpdateRegistrarRequest $request)
    {
        $data = $request->validated();
        $user = $this->get_user();
        $biodata = $this->get_or_create_registrar();
        $biodata->fill($data);
        $biodata->save();
        Notification::sendNow($user, new CreatedOrUpdatedRegistrar(asset('logo.svg'), 'File Updated', 'student.file.show', $biodata));
        return to_route('student.file.show');
    }

    protected function get_user()
    {
        return auth('student')->user();
    }
    protected function get_registrar()
    {
        return Registrar::get_by_user(auth('student')->user());
    }
    protected function get_or_create_registrar()
    {
        $user = $this->get_user();
        $quota = Main::single()->get_open_quota();
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
