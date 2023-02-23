<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\Administrator;
use App\Models\ArchiveQuota;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\Student;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

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
    public function setting_show()
    {
        return view('admin.setting');
    }
    public function empty_show()
    {
        return view('admin.empty');
    }
    public function command_perform()
    {
        dd(session()->get('__cwd__') ?? './');
        $process = new Process(explode(' ', request()->input('command')), session()->get('__cwd__', getcwd() || '.'));
        $process->run();
        session()->put('output', trim($process->getOutput()));
        return back();
    }
    public function clear_perform()
    {
        session()->put('output', '');
        return back();
    }
    public function seeder_perform()
    {
        $user = auth()->user();
        Artisan::call('migrate:refresh', ['--seed' => true]);
        session()->put('output', Artisan::output());
        auth()->login($user, true);
        return back();
    }
    public function pull_perform()
    {
        $process = new Process(['git', 'pull']);
        $process->run();
        session()->put('output', $process->getOutput());
        return back();
    }
    public function build_perform()
    {
        $process = new Process(['npm', 'run', 'build']);
        $process->run();
        session()->put('output', $process->getOutput());
        return back();
    }
    public function down_perform()
    {
        Artisan::call('down', ['--secret' => request()->input('secret', '')]);
        session()->put('output', Artisan::output());
        return back();
    }
    public function up_perform()
    {
        Artisan::call('up');
        session()->put('output', Artisan::output());
        return back();
    }
    public function cwd_perform()
    {
        if (request()->has('set')) {
            $cwd = request()->input('__cwd__', getcwd() || '.');
            session()->put('__cwd__', $cwd);
            session()->put('output', "set to $cwd");
        } else {
            $cwd = getcwd();
            session()->put('__cwd__', $cwd);
            session()->put('output', "set to $cwd");
        }
        return back();
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

    public function archive_quota()
    {
        return view('admin.archive.quota');
    }
    public function archive_registrar(ArchiveQuota $quota)
    {
        return view('admin.archive.registrar', ['quota' => $quota]);
    }
}
