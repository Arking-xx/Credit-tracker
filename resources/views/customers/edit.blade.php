@extends('layout.default')

@section('title', 'EDIT CUSTOMER')

@section('main')

<div class="my-20">
    <div class="flex  items-center justify-center">
        <form action="{{route( 'customers.update', $customer->id )}}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-1">
                <label for="" class="text-gray-700">Name</label>
                <input class="border border-gray-400 px-2 rounded-md" type="text" name="customer_name" id=""
                    value="{{ $customer->customer_name }}">
                <label for="" class="text-gray-700">Address</label>
                <input class="border border-gray-400 px-2 rounded-md" type="text" name="address" id=""
                    value="{{ $customer->address }}">
                <button
                    class=" rounded-2xl bg-blue-50 text-blue-500 mt-2 py-1 font-medium hover:bg-blue-500 hover:text-white">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection