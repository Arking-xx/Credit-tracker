@extends('layout.default')


@section('title', 'Add Transaction')


@section('main')
<div class="my-20">
    <h2 class="text-center font-bold text-gray-800 py-6">ADD TRANSACTION</h2>
    <div class="flex justify-center">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="flex gap-5 py-2">
                <div>
                    <label class="text-gray-700">Customer Name</label><br>
                    <input type="text" name="customer_name" required class="border rounded-sm text-gray-400 px-2" />
                </div>
                <div>
                    <labe class="text-gray-700">Type</label><br>
                        <select name="type" required>
                            <option value="debt">Debt</option>
                            <option value="payment">Payment</option>
                        </select>
                </div>
            </div>

            <div class="flex flex-col">
                <label class="text-gray-700">Address</label>
                <input type="text" name="address" class="border rounded-sm text-gray-400 px-2" />
                <label class="text-gray-700">Amount</label>
                <input class="border rounded-sm text-gray-400 px-2" type="number" name="amount" step="0.01" required />
                <label class="text-gray-700">Note</label>
                <input type="text" name="note" required class="border rounded-sm text-gray-400 px-2" />
            </div>

            <button class="rounded-2xl w-full mt-3 py-1 bg-blue-50 text-blue-500 font-medium"
                type="submit">Save</button>
        </form>
    </div>
</div>
@endsection