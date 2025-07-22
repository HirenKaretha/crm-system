<form method="POST" action="{{ route('messages.send') }}">
    @csrf
    <label>Subject</label>
    <input type="text" name="subject" required><br>

    <label>Message</label>
    <textarea name="message" required></textarea><br>

    <label>Select Customers</label><br>
    @foreach($customers as $customer)
        <input type="checkbox" name="customers[]" value="{{ $customer->id }}"> {{ $customer->name }} <br>
    @endforeach

    <button type="submit">Send Message</button>
</form>