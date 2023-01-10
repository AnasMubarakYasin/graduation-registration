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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = $request->query('perpage', 5);
        // $paginator = Registrar::paginate($perpage);
        // dd($paginator->links());
        $this->authorize('viewAny', Registrar::class);
        return view('resources.registrar.index', ['data' => Registrar::paginate($perpage)]);
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
