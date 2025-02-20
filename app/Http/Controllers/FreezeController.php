<?php

namespace App\Http\Controllers;

use App\Models\Freeze;
use App\Models\registration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FreezeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $freeze = Freeze::latest()->where('gym_id', '=', session('gym_id'))
            ->with([
                'registration' => function ($q) {
                    $q->select('id', 'customer_id')
                        ->with('customer:id,name');
                }
            ])
            ->orderByDesc('freeze_start_date')
            ->paginate(7);

        $freeze->getCollection()->transform(function ($item) {

            $item->status = __('registration.' . $item->status);
            return $item;
        });

        return view('admin.freeze.index', ['freeze' => $freeze]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(registration $registration)
    {

        $data = Registration::select('id', 'customer_id')
            ->with(['customer:id,name'])
            ->find($registration->id);

        return view('admin.freeze.create', ['registration' =>  $data]);
    }


    public function store(Request $request)
    {
        $atrr = $request->validate([
            'freeze_duration' => 'numeric|required|min:1|max:30',
            'id' => 'required|integer'

        ]);
        $registration = Registration::findOrFail($atrr['id']);
        $endDate =  Carbon::parse($registration->end_date);
        $currentDate = Carbon::now();

        Freeze::create([
            'gym_id' => session('gym_id'),
            'registration_id' => $atrr['id'],
            'freeze_duration' =>  $atrr['freeze_duration'],
            'status' => 'active',
            'end_date_remening_days' => $currentDate->diffInDays($endDate),
            'registration_end_date' => $endDate,
            'freeze_end_date' => $currentDate->addDays((int) $atrr['freeze_duration']),
            'freeze_start_date' => Carbon::now(),
        ]);



        $registration->update([
            'status' => 'freezed',
            'end_date' => null
        ]);


        return redirect(route('admin.registration.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Freeze $freeze)
    {
        $freeze->load([
            'registration' => function ($query) {
                $query->select('id', 'customer_id')->with([
                    'customer:id,name'
                ]);
            }
        ]);

        return view('admin.freeze.show', ['freeze' => $freeze]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Freeze $freeze)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Freeze $freeze)
    {
        $freeze->update([
            'status' => 'expired',
        ]);

        registration::findOrFail($freeze->registration_id)->update(
            [
                'status' => 'active',
                'end_date' => Carbon::now()->addDays($freeze->end_date_remening_days)

            ]

        );

        return redirect()->route('admin.registration.index')->with('success', __('freeze.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Freeze $freeze)
    {
        //
    }
}
