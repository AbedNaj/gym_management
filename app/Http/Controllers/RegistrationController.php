<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\debts;
use App\Models\plans;
use App\Models\registration;
use App\Http\Requests\StoreregistrationRequest;
use App\Http\Requests\UpdateregistrationRequest;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $gym = Session::get('gym_id');

        $registration  = Registration::orderByDesc('start_date')
            ->latest()
            ->where('gym_id', $gym)
            ->select('id', 'start_date', 'end_date', 'status', 'customer_id')
            ->with(['customer' => function ($query) {
                $query->select('id', 'name');
            }])
            ->paginate(perPage: 7);

        return view('admin.registration.index', ['registration' => $registration]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        $plans = plans::latest()
            ->where('gym_id', '=', Session::get('gym_id'))->get();

        return view('admin.registration.create', [
            'customerName' => $customer->name,
            'customerID' => $customer->id,
            'plans' => $plans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreregistrationRequest $request, Customer $customer)
    {


        $attr = $request->validated();


        $gym = Session::get('gym_id');
        $attr['gym_id'] = $gym;

        $planDaysCount = Plans::where('id', '=', $attr['plans_id'])->value('duration_in_days');

        $attr['end_date'] = Carbon::parse($attr['start_date'])
            ->addDays($planDaysCount)
            ->toDateString();

        if ($attr['paid_amount'] <  $attr['plan_price']) {

            debts::create([
                'debt_amount' => $attr['plan_price'],
                'paid_amount' =>  $attr['paid_amount'],
                'debt_date' => now()->toDateString(),
                'gym_id' => $gym,
                'customer_id' => $attr['customer_id'],
            ]);
        } elseif ($attr['paid_amount'] >  $attr['plan_price']) {
            throw ValidationException::withMessages(['paid_amount' => 'Payed Price Is More Than Plan Price']);
        }
        $attr = registration::create($attr);


        return redirect(route('admin.registration.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {

        $customerID = $customer->id;



        $registration = registration::where('customer_id', '=', $customerID)
            ->where('gym_id', '=', Session::get('gym_id'))
            ->latest()
            ->first();

        return view('admin.registration.show', [
            'customerName' => $customer->name,
            'customerID' => $customer->id,
            'registration' => $registration
        ]);
    }

    public function showAll(Customer $customer)
    {


        $customerID = $customer->id;
        $registration  = Registration::latest()
            ->where('customer_id', $customerID)
            ->select('id', 'start_date', 'end_date', 'status', 'customer_id')
            ->with(['customer' => function ($query) {
                $query->select('id', 'name');
            }])
            ->paginate(7);




        return view('admin.registration.show-all', ['registration' => $registration]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {

        $data = Registration::select('id', 'start_date', 'end_date', 'customer_id', 'plans_id')
            ->with(['customer:id,name'], ['plan:id,name'])
            ->findOrFail($registration->id);


        return view('admin.registration.edit', ['registration' => $data]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateregistrationRequest $request, registration $registration)
    {
        $attr =   $request->validate([
            'status' => [
                'required',

            ],
        ]);
        $registration->update($attr);

        return redirect(route('admin.registration.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function search(Request $request)
    {
        $gym = Session::get('gym_id');
        $status = $request->input('status');
        $customer = $request->input('customer');
        $registrations = Registration::orderByDesc('start_date')
            ->select('id', 'start_date', 'end_date', 'status', 'customer_id')
            // Apply status filter only if $status is not empty
            ->when(!empty($status), function ($query) use ($status) {
                $query->where('status', $status);
            })
            // Apply customer filter only if $customer is not empty
            ->when(!empty($customer), function ($query) use ($customer) {
                $query->whereHas('customer', function ($q) use ($customer) {
                    $q->where('id', $customer);
                });
            })
            // Always apply gym_id filter
            ->where('gym_id', $gym)
            ->paginate(7);

        return view('admin.registration.index', ['registration' => $registrations]);
    }
}
