@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Add New Customer
    </h2>
@endsection

@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-3xl mx-auto">
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Name</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Contact</label>
            <input type="text" name="contact" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Address</label>
            <textarea name="address" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-500" rows="3"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Status</label>
            <select name="status" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-500">
                <option value="Lead">Lead</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('customers.index') }}" class="mr-4 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save Customer</button>
        </div>
    </form>
</div>
@endsection
