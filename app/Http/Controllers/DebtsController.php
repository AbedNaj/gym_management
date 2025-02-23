<?php

namespace App\Http\Controllers;

use App\Models\debts;
use App\Http\Requests\StoredebtsRequest;
use App\Http\Requests\UpdatedebtsRequest;
use App\Models\Customer;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\select;

class DebtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debts = debts::select('id', 'debt_amount', 'paid_amount', 'last_payment_date', 'status', 'debt_date', 'customer_id')
            ->where('gym_id', '=', Session::get('gym_id'))
            ->with('customer', function ($q) {
                $q->select('id', 'name');
            })
            ->orderByDesc('debt_date')
            ->latest()
            ->paginate(7);

        $debts->getCollection()->transform(function ($item) {
            $item->status = __('debts.' . $item->status);
            return $item;
        });

        return view('admin.debts.index', ['debts' => $debts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {

        return view('admin.debts.create', [
            'customerName' => $customer->name,
            'customerID' => $customer->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredebtsRequest $request, Customer $customer)
    {


        $atrr = $request->validated();
        $atrr['gym_id'] = Session::get('gym_id');
        $atrr['debt_date'] = now()->toDateString();


        if ($atrr['debt_amount'] == $atrr['paid_amount']) {
            $atrr['status'] = 'paid';
        } elseif ($atrr['debt_amount'] < $atrr['paid_amount']) {
            throw ValidationException::withMessages(['paid_amount' => 'Paid amount is more than debt amount']);
        }


        $debtID =  debts::create($atrr)->id;

        if ($atrr['paid_amount'] > 0) {
            Payment::create([
                'amount' => $atrr['paid_amount'],
                'debts_id' => $debtID,
                'gym_id' => $atrr['gym_id'],
                'customer_id' => $atrr['customer_id'],
                'payment_date' => Carbon::now(),
            ]);
        }

        return redirect()->route('admin.debts.index')->with('success', 'Debt Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $debt_amount = debts::where('customer_id', '=', $customer->id)
            ->where('gym_id', '=', Session::get('gym_id'))
            ->sum('debt_amount');



        $paid_amount = debts::where('customer_id', '=', $customer->id)
            ->where('gym_id', '=', Session::get('gym_id'))
            ->sum('paid_amount');


        $debts =  debts::where('customer_id', '=', $customer->id)
            ->where('gym_id', '=', Session::get('gym_id'))->get();


        return view('admin.debts.show', [
            'customerID' => $customer->id,
            'customerName' => $customer->name,
            'debt_amount' => $debt_amount,
            'paid_amount' => $paid_amount,
            'debts' => $debts
        ]);
    }
    public function showAll(Customer $customer)
    {

        $debts = debts::select('id', 'debt_amount', 'paid_amount', 'last_payment_date', 'status', 'debt_date', 'customer_id')->where('customer_id', '=', $customer->id)
            ->where('gym_id', '=', Session::get('gym_id'))
            ->orderByDesc('debt_date')
            ->paginate(7);

        $debts->getCollection()->transform(function ($item) {
            $item->status = __('debts.' . $item->status);
            return $item;
        });
        return view('admin.debts.show-all', ['debts' => $debts, 'CustomerName' => $customer->name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(debts $debt)
    {

        $debt->load(['customer:id,name']);

        $customerName = $debt->customer->name;

        return view('admin.debts.edit', ['debt' => $debt,  'customerName' => $customerName]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedebtsRequest $request, debts $debt)
    {

        $atrr = $request->validated();

        $atrr['last_payment_date'] = now()->toDateString();

        $currentPaid = $atrr['paid_amount'];

        // total paid amount
        $atrr['paid_amount'] = $debt->paid_amount + $atrr['paid_amount'];

        if ($atrr['debt_amount'] == $atrr['paid_amount']) {
            $atrr['status'] = 'paid';
        } elseif ($atrr['debt_amount'] < $atrr['paid_amount']) {
            throw ValidationException::withMessages(['paid_amount' => 'Paid amount is more than debt amount']);
        }

        $customerID = $debt->customer->id;


        $debt->update($atrr);
        Payment::create([
            'amount' => $currentPaid,
            'debts_id' => $debt->id,
            'gym_id' => Session('gym_id'),
            'customer_id' => $customerID,
            'payment_date' => Carbon::now()

        ]);
        return redirect()->route('admin.debts.index')->with('success', 'Debt Payed successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(debts $debts)
    {
        //
    }

    public function search(Request $request)
    {
        $gym = Session::get('gym_id');
        $status = $request->input('status');
        $customer = $request->input('customer');
        $debts = debts::orderByDesc('debt_date')

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

        $debts->GetCollection()->transform(function ($item) {

            $item->status = __('debts.' . $item->status);
            return ($item);
        });
        return view('admin.debts.index', ['debts' => $debts]);
    }
}
