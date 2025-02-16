<?php

namespace App\Http\Controllers;

use App\Models\plans;
use App\Http\Requests\StoreplansRequest;
use App\Http\Requests\UpdateplansRequest;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gym = session('gym_id');
        $plans = plans::where('gym_id', '=', $gym)
            ->latest()->paginate(7);

        return view('admin.plans.index', [
            'plans' => $plans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreplansRequest $request)
    {

        $attr = $request->validated();
        $attr['gym_id'] = session('gym_id');
        plans::create($attr);
        return redirect(route('admin.plans.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(plans $plans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(plans $plans)
    {
        return view('admin.plans.edit', ['plan' => $plans]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplansRequest $request, plans $plans)
    {
        $attr = $request->validated();
        $plans->update($attr);

        return redirect(route('admin.plans.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(plans $plans)
    {
        $plans->delete();
        return redirect(route('admin.plans.index'));
    }
    public function search()
    {
        $gym = session('gym_id');
        $plans = plans::latest()->where('gym_id', '=', $gym)
            ->where('name', 'like', '%' . request('name') . '%')
            ->paginate(7);

        return view('admin.plans.index', [
            'plans' => $plans
        ]);
    }
}
