<form method="POST" action="{{ route('customers.sendBulkMessage') }}">
    @csrf
    <textarea name="message" placeholder="Type message here..." class="w-full p-2 border rounded mb-4"></textarea>
    <div class="flex items-center space-x-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Send to All</button>
    </div>
</form>