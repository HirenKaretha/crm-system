@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Customers Management
    </h2>
@endsection

@section('content')
<form action="{{ route('customers.sendMessageAll') }}" method="POST" class="mb-4">
    @csrf
    <button type="submit" onclick="return confirm('Are you sure you want to send message to all customers?')"
        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
        📤 Send Message to All Customers
    </button>
</form>

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Customer List</h3>
        <a href="{{ route('customers.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Customer
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-200 dark:border-gray-700 text-sm">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr class="text-left text-gray-600 dark:text-gray-300">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Contact</th>
                    <th class="px-4 py-2 border">Address</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800">
                @forelse ($customers as $customer)
                    <tr class="border-t text-gray-700 dark:text-gray-300">
                        <td class="px-4 py-2 border">{{ $customer->id }}</td>
                        <td class="px-4 py-2 border">{{ $customer->name }}</td>
                        <td class="px-4 py-2 border">{{ $customer->email }}</td>
                        <td class="px-4 py-2 border">{{ $customer->contact }}</td>
                        <td class="px-4 py-2 border">{{ $customer->address }}</td>
                        <td class="px-4 py-2 border capitalize">{{ $customer->status }}</td>
                        <td class="px-4 py-2 border space-x-1">
                            <a href="{{ route('conversations.create', $customer->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs">
                                + Add Conversation
                            </a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs">Edit</a>
                            <a href="{{ route('customers.show', $customer->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">View</a>
                            <form action="{{ route('customers.sendMessage', $customer->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to send a message to this customer?')">
                                @csrf
                                <button type="submit" class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-xs">Send Message</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                            No customers found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@if (session('success'))
    <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif