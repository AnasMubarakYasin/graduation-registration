<?php

namespace App\Http\Controllers;

use App\Feature\Main;
use App\Http\Requests\StoreRegistrarRequest;
use App\Http\Requests\StudentLoginRequest;
use App\Http\Requests\UpdateRegistrarRequest;
use App\Models\Quota;
use App\Models\Registrar;
use App\Notifications\BiodataStore;
use App\Notifications\CreatedOrUpdatedRegistrar;
use App\Notifications\FileStore;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function login_show()
    {
        return view('student.login');
    }
    public function login_perfom(StudentLoginRequest $request)
    {
        $data = $request->validated();
        if (auth('student')->attempt(Arr::only($data, ['nim', 'password']), isset($data['remember']))) {
            session()->regenerate();
            return to_route('student.dashboard.show');
        } else {
            return back()->withErrors(['nim' => ['nim mismatch'], 'password' => ['password mismatch']]);
        }
    }
    public function logout_perfom()
    {
        auth('student')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return to_route('student.login.show');
    }

    public function dashboard_show()
    {
        $main = Main::single();
        return view('student.dashboard', [
            'user' => $this->get_user(),
            'quota' => $main->stats_quota($main->get_open_quota()),
            'registrar' => $main->stats_registrar_student($this->get_registrar()),
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
        if ($request->file('photo')) {
            if ($biodata->photo) {
                Storage::delete($biodata->photo);
            }
            $biodata->photo = Storage::put("public/student/$user->id", $request->file('photo'), 'public');
        }
        $biodata->save();
        Notification::sendNow($user, new CreatedOrUpdatedRegistrar(asset('logo.svg'), 'Biodata Updated', 'student.data.show', $biodata));
        return to_route('student.data.show');
    }
    public function file_store(UpdateRegistrarRequest $request)
    {
        $request->validated();
        $user = $this->get_user();
        $biodata = $this->get_or_create_registrar();
        if ($request->file('munaqasyah')) {
            if ($biodata->munaqasyah) {
                Storage::delete($biodata->munaqasyah);
            }
            $biodata->munaqasyah = Storage::put("public/student/$user->id", $request->file('munaqasyah'), 'public');
        }
        if ($request->file('certificate')) {
            if ($biodata->school_certificate) {
                Storage::delete($biodata->school_certificate);
            }
            $biodata->school_certificate = Storage::put("public/student/$user->id", $request->file('certificate'), 'public');
        }
        if ($request->file('ktp')) {
            if ($biodata->ktp) {
                Storage::delete($biodata->ktp);
            }
            $biodata->ktp = Storage::put("public/student/$user->id", $request->file('ktp'), 'public');
        }
        if ($request->file('kk')) {
            if ($biodata->kk) {
                Storage::delete($biodata->kk);
            }
            $biodata->kk = Storage::put("public/student/$user->id", $request->file('kk'), 'public');
        }
        if ($request->file('spukt')) {
            if ($biodata->spukt) {
                Storage::delete($biodata->spukt);
            }
            $biodata->spukt = Storage::put("public/student/$user->id", $request->file('spukt'), 'public');
        }
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
        return Registrar::where('student_id', auth('student')->user()->id)->first();
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
