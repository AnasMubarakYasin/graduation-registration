<?php

namespace App\Http\Controllers\User\Operator;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use App\Models\Registrar;

class AcademicController extends Controller
{
    public function dashboard()
    {
        return view('operator.academic.dashboard', [
            'quota' => Quota::stats(),
            'registrar' => Registrar::stats_status(),
        ]);
    }
    public function registrar()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.academic.registrar', [
            'data' => Registrar::all(),
        ]);
    }
    public function registrar_validate(Registrar $registrar)
    {
        return view('operator.academic.registrar-validate', ['data' => $registrar]);
    }
    public function empty()
    {
        return view('operator.academic.empty');
    }
}
