<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuotaRequest;
use App\Http\Requests\UpdateQuotaRequest;
use App\Models\Quota;

class QuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Quota::class);
        return view('admin.quota.index', ['data' => Quota::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuotaRequest $request)
    {
        $this->authorize('create', Quota::class);
        $data = $request->validated();
        $quota = Quota::create($data);
        return to_route('admin.quota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Http\Response
     */
    public function show(Quota $quota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Http\Response
     */
    public function edit(Quota $quota)
    {
        return view('admin.quota.edit', ['data' => $quota]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuotaRequest  $request
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuotaRequest $request, Quota $quota)
    {
        $this->authorize('update', $quota);
        $data = $request->validated();
        $quota->update($data);
        return to_route('admin.quota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quota $quota)
    {
        $this->authorize('delete', $quota);
        $quota->delete();
        return to_route('admin.quota.index');
    }
}
