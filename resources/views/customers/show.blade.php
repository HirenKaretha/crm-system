@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        View Customer Details
    </h2>
@endsection

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Customer Info</h3>
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Customer List</h3>
        <a href="{{ route('customers.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Customer
        </a>
    </div>
    
    <div class="mb-2">
        <strong>Name:</strong> {{ $customer->name }}
    </div>
    <div class="mb-2">
        <strong>Email:</strong> {{ $customer->email }}
    </div>
    <div class="mb-2">
        <strong>Contact:</strong> {{ $customer->contact }}
    </div>
    <div class="mb-2">
        <strong>Address:</strong> {{ $customer->address }}
    </div>
    <div class="mb-2">
        <strong>Status:</strong> {{ $customer->status }}
    </div>

    <div class="mt-4">
        <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Back</a>
        <a href="{{ route('customers.edit', $customer->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 ml-2">Edit</a>
    </div>
</div>
@endsection