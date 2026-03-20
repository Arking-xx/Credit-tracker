@extends('layout.default')


@section('title', 'Edit Transaction')


@section('main')
<div class="my-20">
    <h2 class="text-center font-bold text-gray-800 py-6">EDIT TRANSACTION</h2>
    <div class="flex justify-center">
        <form action="{{ route('transactions.update', $customerTransaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex gap-5 py-2">
                <div>
                    <label class="text-gray-700">Customer Name</label><br>
                    <select name="customer_id" id="">
                        @foreach($customers as $customer)
                        <option class="" value="{{ $customer->id }}"
                            {{$customerTransaction->customer_id == $customer->id ? 'selected': ''}}>
                            {{$customer->customer_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700">Type</label><br>
                    <select name="type" required>
                        <option value="debt" {{ $customerTransaction->type == 'debt' ? 'selected' : '' }}>Debt</option>
                        <option value="payment" {{ $customerTransaction->type == 'payment' ? 'selected' : '' }}>Payment
                        </option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col">
                <label class="text-gray-700">Address</label>
                <input type="text" name="address" class="border rounded-sm px-2 text-gray-400"
                    value="{{ $customerTransaction->customer->address }}" />
                <label class="text-gray-700">Amount</label>
                <input class="border rounded-sm text-gray-400 px-2" type="number" name="amount" step="0.01"
                    value="{{ $customerTransaction->amount }}" required />
                <label class="text-gray-700">Note</label>
                <input type="text" name="note" required class="border rounded-sm text-gray-400 px-2"
                    value="{{ $customerTransaction->note }}" />
                <label class="text-gray-700">Date</label>
                <input type="datetime-local" name="created_at" required class="border rounded-sm text-gray-400 px-2"
                    value="{{ $customerTransaction->created_at->format('Y-m-d\TH:i') }}" />
            </div>
            <button
                class="rounded-2xl w-full mt-3 py-1 bg-blue-50 text-blue-500 font-medium hover:bg-blue-500 hover:text-white"
                type="submit">Save</button>
        </form>
        @if($errors->any())
        @foreach($errors->all() as $error)
        <p class="text-red-500">{{ $error }}</p>
        @endforeach
        @endif
    </div>
</div>
@endsection