<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gym = Auth::user()->gym;

        $customers = Customer::where('gym_id', $gym->id)
            ->latest('created_at')
            ->paginate(5);
        return view('admin.customers.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $attr = $request->validated();
        $attr['gym_id'] = Auth::user()->gym->id;
        Customer::create($attr);

        return redirect(route('admin.customers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        dd($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {

        return view(
            'admin.customers.edit',
            ["customer" => $customer]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $attr = $request->validated();

        $customer->update($attr);
        return redirect(route('admin.customers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {

        $customer->delete();
        return redirect(route('admin.customers.index'));
    }

    public function search()
    {
        $gym = Auth::user()->Gym;
        $Customers = Customer::where(
            'name',
            'like',
            '%' . request('customer') . '%'
        )->where('gym_id', '=', $gym->id)->paginate(5);


        return view('admin.customers.index', [
            'customers' =>  $Customers
        ]);
    }
}
