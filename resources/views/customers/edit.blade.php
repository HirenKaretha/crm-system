@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Edit Customer
    </h2>
@endsection

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded shadow-md max-w-xl mx-auto">
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div class="mb-4">
            <label for="contact" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact</label>
            <input type="text" name="contact" id="contact" value="{{ old('contact', $customer->contact) }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:text-white">
        </div>

        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
            <textarea name="address" id="address" rows="3"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:text-white">{{ old('address', $customer->address) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
            <select name="status" id="status" required
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 dark:bg-gray-700 dark:text-white">
                <option value="Lead" {{ $customer->status == 'Lead' ? 'selected' : '' }}>Lead</option>
                <option value="Active" {{ $customer->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $customer->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('customers.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
