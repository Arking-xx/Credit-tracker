@extends('layout.default')


@section('title', 'Dashboard')

@section('navbar')
<nav class="bg-orange-100 ">
    <ul class="flex justify-between items-center min-h-20 gap-2 px-6">
        <div>
            <h1>Credit Tracker</h1>
        </div>
        <div class="flex gap-4 ">
            <li>Dashboard</li>
            <li>Customers</li>
            <li>History</li>

        </div>
    </ul>
</nav>
@endsection

@section('main')

<div class="p-6">
    <div class="flex justify-between items-center mb-5">
        <div>
            <h2 class="text-lg font-medium text-gray-900">Customer Transactions</h2>
            <p class="text-sm text-gray-500">Manage debts and payments</p>
        </div>
        <a href="{{ route('customers.create') }}"
            class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg">
            + Add transaction
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-gray-200">
                <tr>
                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Name</th>
                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Type</th>
                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Amount</th>
                    <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Note</th>
                    <th class="text-center px-4 py-3 text-xs font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)

                <tr>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $customer->customer_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection