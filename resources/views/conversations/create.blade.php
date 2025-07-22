@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
        Add Conversation for {{ $customer->name }}
    </h2>
@endsection

@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 shadow rounded">
        <form method="POST" action="{{ route('conversations.store', $customer->id) }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Time</label>
                <input type="datetime-local" name="time" class="w-full mt-1 p-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Medium</label>
                <select name="medium" class="w-full mt-1 p-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    <option value="Call">Call</option>
                    <option value="Email">Email</option>
                    <option value="SMS">SMS</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Meeting">Meeting</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Notes</label>
                <textarea name="notes" rows="4" class="w-full mt-1 p-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Conversation
            </button>
        </form>
    </div>
@endsection
