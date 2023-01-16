<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuotaRequest;
use App\Http\Requests\UpdateQuotaRequest;
use App\Models\Quota;
use Illuminate\Http\Request;

class QuotaController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Quota::class);

        return view('resources.quota.index', ['data' => Quota::all()]);
    }
    public function show(Quota $quota)
    {
        //
    }
    public function create()
    {
        return view('resources.quota.create');
    }
    public function store(StoreQuotaRequest $request)
    {
        $this->authorize('create', Quota::class);
        $data = $request->validated();
        $quota = Quota::create($data);

        return redirect()->intended($request->string('_index'));
    }
    public function restore(Request $request)
    {
        $this->authorize('restore', Quota::class);
        return redirect()->intended($request->string('_index'));
    }
    public function archive(Quota $quota)
    {
        //
    }
    public function dearchive(Quota $quota)
    {
        //
    }
    public function edit(Quota $quota)
    {
        return view('resources.quota.edit', ['data' => $quota]);
    }
    public function update(UpdateQuotaRequest $request, Quota $quota)
    {
        $this->authorize('update', $quota);
        $data = $request->validated();
        $quota->update($data);

        return redirect()->intended($request->string('_index'));
    }
    public function delete(Request $request, Quota $quota)
    {
        $this->authorize('delete', $quota);
        $quota->delete();

        return back();
    }
    public function delete_any(Request $request)
    {
        $this->authorize('deleteAny', Quota::class);
        if ($request->input('all')) {
            count($request->input('id', [])) == Quota::count() && Quota::truncate();
        } else {
            Quota::destroy($request->input('id', []));
        }
        return back();
    }
}
