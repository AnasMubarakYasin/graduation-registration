<?php

namespace App\Http\Controllers\User\Operator;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use App\Models\Registrar;

class FacultyController extends Controller
{
    public function dashboard()
    {
        return view('operator.faculty.dashboard', [
            'quota' => Quota::stats(),
            'registrar' => Registrar::stats_status(auth()->user()->faculty),
        ]);
    }
    public function registrar()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.faculty.registrar');
    }
    public function registrar_validate(Registrar $registrar)
    {
        return view('operator.faculty.registrar-validate', ['registrar' => $registrar]);
    }
    public function empty()
    {
        return view('operator.faculty.empty');
    }
}
