@extends('layout.default')


@section('title', 'Dashboard')

@section('main')

<div class="p-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-lg font-medium text-gray-900">Customer Transactions</h2>
            <p class="text-sm text-gray-500">Manage debts and payments</p>
        </div>
        <div class="flex gap-2">
            <button href="" class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg">
                Select All
                <input type="checkbox" name="" id="selectAll">
            </button>
            <a href="{{ route('customers.create') }}"
                class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg">
                + Add transaction
            </a>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <form class="" action="{{ route('customers.deleteMultipleCustomersTransaction') }}" method="POST">
            @csrf
            @method('DELETE')
            <table class="w-full text-sm">
                <thead class="border-b border-gray-200 ">
                    <tr>
                        <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Customer</th>
                        <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Type</th>
                        <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Amount</th>
                        <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Note</th>
                        <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Date</th>
                        <th class="text-left px-4 py-3 text-xs font-medium text-gray-500">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    @foreach($customer->customerTransactions as $transaction)
                    <tr class="">
                        <td class="px-4 py-3 font-medium text-gray-900 capitalize-first">{{ $customer->customer_name }}
                        </td>
                        <td>
                            @if($transaction->type === 'debt')
                            <span class="bg-red-50 text-red-700 text-cs font-medium px-3 py-1 rounded-full">Debt</span>
                            @else
                            <span
                                class="bg-green-50 text-green-700 text-cs font-medium px-3 py-1 rounded-full">Payment</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-gray-900">{{ number_format($transaction->amount, 2) }}</td>
                        <td class="px-4 py-3 text-gray-900 capitalize-first">{{ $transaction->note }}</td>
                        <td class="px-4 py-3 text-gray-900">{{ $transaction->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('transactions.edit', $transaction->id) }}"
                                    class="bg-blue-50 text-blue-700 text-md font-medium px-3 py-1 rounded-md">
                                    Edit
                                </a>
                                <input class="" type="checkbox" name="ids[]" value="{{ $customer->id }}" id="">
                            </div>
                        </td>
                    </tr>

                    @endforeach
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-end px-45 py-2">
                <button id="deleteSelectBtn" class="rounded-md text-md font-medium p-1 bg-red-50 text-red-700"
                    type="submit" onclick="return confirm('Delete this row?')">Delete
                    Selected</button>
            </div>
        </form>
    </div>

</div>

<script>
document.getElementById('selectAll').addEventListener('change', function() {
    document.querySelectorAll('input[name="ids[]"]').forEach(checkbox => {
        checkbox.checked = this.checked;
    })
    toggleDeleteButton();
})

document.querySelectorAll('input[name="ids[]"]')
    .forEach(checkbox => {
        checkbox.addEventListener('change', toggleDeleteButton);
    })

function toggleDeleteButton() {
    const anyChecked = document.querySelectorAll('input[name="ids[]"]:checked').length > 0;
    document.getElementById('deleteSelectBtn').style.display = anyChecked ? 'block' : 'none';
}

toggleDeleteButton();
</script>
@endsection