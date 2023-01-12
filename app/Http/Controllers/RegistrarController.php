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
use Illuminate\Support\Facades\DB;

class RegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            // $paginator = Registrar::where('nim', $request->query('f_nim'))
            //     ->paginate($perpage);
        } else {
            $paginator = Registrar::paginate($perpage);
        }
        // DB::table('')->whereFullText()->orWhere()
        // $paginator = Registrar::paginate($perpage);
        // dd($paginator);
        return view('resources.registrar.index', ['data' => $paginator]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resources.registrar.create', [
            'quota' => Quota::get_all_open(),
            'student' => Student::all_without_registrar(),
            'faculties' => Faculty::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistrarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrarRequest $request)
    {
        $this->authorize('create', Registrar::class);
        $quota = Quota::get_first_open();
        if (!$quota) {
            throw new CreateRegistrarException('create registrar where not any quota open', 400);
        }
        $data = $request->validated();
        $registrar = Registrar::create($data);

        return to_route('resources.registrar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function show(Registrar $registrar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrar $registrar)
    {
        return view('resources.registrar.edit', [
            'data' => $registrar,
            'quota' => Quota::get_all_open(),
            'student' => Student::all_without_registrar(),
            'faculties' => Faculty::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistrarRequest  $request
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrarRequest $request, Registrar $registrar)
    {
        $this->authorize('update', $registrar);
        $data = $request->validated();
        $registrar->update($data);

        return to_route('resources.registrar.index');
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

        return to_route('resources.registrar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrar $registrar)
    {
        $this->authorize('delete', $registrar);
        $registrar->delete();

        return to_route('resources.registrar.index');
    }
}
