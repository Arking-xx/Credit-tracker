<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerTransaction;
use Illuminate\Http\Request;

class CustomerTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customerTransactions = CustomerTransaction::all();
        return view('customers.index', compact('customerTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
            'customer_id' => 'required',
            'type' => 'required|in:debt,payment',
            'amount' => 'required|numeric',
            'note' => 'required|string'
        ]);

        CustomerTransaction::create($validate);
        return redirect()->route('dashboard')->with('success', 'Successfully add');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $customerTransaction = CustomerTransaction::findOrFail($id);
        $customers = Customer::all();
        return view('transactions.edit', compact('customers', 'customerTransaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
            'customer_id' => 'required',
            'type' => 'required|in:debt,payment',
            'amount' => 'required|numeric',
            'note' => 'required|string',
            'created_at' => 'required|date'
        ]);

        $customerTransaction = CustomerTransaction::findOrFail($id);
        $customerTransaction->update($validate);

        return redirect()->route('customers.index')->with('success', 'Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $customerTransaction = CustomerTransaction::findOrFail($id);
        $customerTransaction->delete();

        return redirect()->route('dashboard');
    }
}
