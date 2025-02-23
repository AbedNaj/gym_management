<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->select('id', 'amount', 'customer_id', 'payment_date')
            ->where('gym_id', '=', session('gym_id'))
            ->with('customer:name,id')
            ->orderByDesc('payment_date')
            ->paginate(7);

        return view('admin.payment.index', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $customerID = $request->input('customer');

        $payments = Payment::latest()->select('id', 'amount', 'customer_id', 'payment_date')
            ->where('gym_id', '=', session('gym_id'))
            ->where('customer_id', '=', $customerID)
            ->with('customer:name,id')
            ->orderByDesc('payment_date')
            ->paginate(7);

        return view('admin.payment.index', ['payments' => $payments]);
    }


    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        $payment->load(['customer:name,id']);

        return view('admin.payment.show', ['payment' => $payment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
