@extends('layout.default')


@section('main')

<div class="p-6">
    <div class="flex justify-between items-center mb-5">
        <div>
            <h2 class="text-lg font-medium text-gray-900">Customer Information</h2>
            <p class="text-sm text-gray-500">Manage Customer Information</p>
        </div>
    </div>

    <div class=" border border-gray-200 rounded-xl overflow-x-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-gray-200">
                <tr class="text-gray-500">
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($customers as $customer)
                <tr>
                    <td class="text-center px-4 py-3 font-medium text-gray-900 capitalize-first">
                        {{ $customer->customer_name }}</td>
                    <td class="text-center px-4 py-3 font-medium text-gray-900 capitalize-first">
                        {{ $customer->address }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex flex-col  gap-2">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('customers.edit', $customer->id) }}"
                                    class="bg-blue-50 text-blue-700 text-md font-medium px-3 py-1 rounded-md">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <p class="text-red-500">{{ $error }}</p>
    @endforeach
    @endif
</div>



@endsection