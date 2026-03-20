<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = Customer::with('customerTransactions')->get();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function customer()
    {
        $customers = Customer::get();
        return view('customers.customer', compact('customers'));
    }

    public function create()
    {
        //
        return view('customers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'customer_name' => 'required|string',
            'address' => 'nullable|string|max:100',
            'type' => 'required|in:debt,payment',
            'amount' => 'required|numeric',
            'note' => 'required|string',
        ]);

        $customer = Customer::create([
            'customer_name' => $request->customer_name,
            'address' => $request->address ?? 'Not Available'
        ]);

        $customer->customerTransactions()->create([
            'type' => $request->type,
            'amount' => $request->amount,
            'note' => $request->note
        ]);

        return redirect()->route('customers.index')->with('success', 'Transaction added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
            'customer_name' => 'required',
            'address' => 'nullable|max:100',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($validate);

        return redirect()->route('customers.customer')->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        //
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index');
    }

    public function deleteMultipleCustomersTransaction(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:customers,id'
        ]);

        Customer::whereIn('id', $request->ids)->delete();

        return redirect()->route('customers.index');
    }
}
