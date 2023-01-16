<?php

namespace App\Http\Controllers;

use App\Exceptions\CreateRegistrarException;
use App\Http\Requests\StoreRegistrarRequest;
use App\Http\Requests\UpdateRegistrarRequest;
use App\Models\Faculty;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\Student;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Registrar::class);
        $column = $request->query('column');
        $perpage = $request->query('perpage', 5);
        if ($request->query('filter')) {
            $paginator = Registrar::whereFullText('name', $request->query('f_name'))
                ->orWhere('nim', $request->query('f_nim'))
                ->orWhere('status', $request->query('f_status'))
                ->orWhere('faculty', $request->query('f_faculty'))
                ->orWhere('study_program', $request->query('f_study_program'))
                ->paginate($perpage);
        } else {
            $paginator = Registrar::paginate($perpage);
        }
        return view('resources.registrar.index', ['data' => $paginator]);
    }
    public function create()
    {
        return view('resources.registrar.create', [
            'quota' => Quota::get_all_open(),
            'student' => Student::all_without_registrar(),
            'faculties' => Faculty::all(),
        ]);
    }
    public function store(StoreRegistrarRequest $request)
    {
        $this->authorize('create', Registrar::class);
        $quota = Quota::get_first_open();
        if (!$quota) {
            throw new CreateRegistrarException('create registrar where not any quota open', 400);
        }
        $data = $request->validated();
        $registrar = Registrar::create($data);

        return redirect()->intended($request->input('index'));
    }
    public function show(Registrar $registrar)
    {
        //
    }
    public function edit(Registrar $registrar)
    {
        return view('resources.registrar.edit', [
            'data' => $registrar,
            'quota' => Quota::get_all_open(),
            'student' => Student::all_without_registrar(),
            'faculties' => Faculty::all(),
        ]);
    }
    public function update(UpdateRegistrarRequest $request, Registrar $registrar)
    {
        $this->authorize('update', $registrar);
        $data = $request->validated();
        $registrar->update($data);

        return redirect()->intended($request->input('index'));
    }

    public function show_validate(Registrar $registrar)
    {
        return view('resources.registrar.validate', ['data' => $registrar]);
    }
    public function perform_validate(UpdateRegistrarRequest $request, Registrar $registrar)
    {
        $this->authorize('validate', $registrar);
        $data = $request->validated();
        $registrar->update($data);

        return redirect()->intended($request->input('index'));
    }

    public function destroy(Request $request)
    {
        $this->authorize('deleteAny', Registrar::class);
        if ($request->input('all')) {
            Registrar::truncate();
        } else {
            Registrar::destroy($request->input('id', []));
        }

        return back();
    }
    public function delete(Registrar $registrar)
    {
        $this->authorize('delete', $registrar);
        $registrar->delete();

        return back();
    }
}
