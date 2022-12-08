<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuotaRequest;
use App\Http\Requests\UpdateQuotaRequest;
use App\Models\Quota;

class QuotaController extends Controller
{
    protected function get_user()
    {
        return auth('admin')->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quota.index', ['user' => $this->get_user(), 'data' => Quota::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quota.create', ['user' => $this->get_user()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuotaRequest $request)
    {
        $data = $request->validated();
        /** @var Quota */
        $quota = Quota::create($data);
        return redirect()->intended(route('admin.quota.index'));
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
        return view('admin.quota.edit', ['user' => $this->get_user(), 'data' => $quota]);
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
        $data = $request->validated();
        $quota->update($data);
        return redirect()->intended(route('admin.quota.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quota $quota)
    {
        $quota->delete();
        return redirect()->intended(route('admin.quota.index'));
    }
}
