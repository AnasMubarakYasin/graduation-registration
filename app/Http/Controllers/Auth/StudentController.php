<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;
use App\Models\Student;
use Illuminate\Support\Arr;

class StudentController extends Controller
{
    public function login_show()
    {
        return view('student.login');
    }

    public function login_perform(StudentLoginRequest $request)
    {
        $data = $request->validated();
        $user = Student::where('nim', $data['nim'])->where('password', $data['password'])->first();
        if ($user) {
            auth()->login($user, isset($data['remember']));
            // session()->regenerate();

            return to_route('student.dashboard.show');
        } else {
            return back()->withErrors(['nim' => ['nim mismatch'], 'password' => ['password mismatch']]);
        }
    }

    public function logout_perform()
    {
        auth('student')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('student.login.show');
    }
}
