<div>
    <label>Name</label>
    <input type="text" name="name" class="input" value="{{ old('name', $customer->name ?? '') }}">
</div>
<div>
    <label>Email</label>
    <input type="email" name="email" class="input" value="{{ old('email', $customer->email ?? '') }}">
</div>
<div>
    <label>Contact</label>
    <input type="text" name="contact" class="input" value="{{ old('contact', $customer->contact ?? '') }}">
</div>
<div>
    <label>Address</label>
    <textarea name="address" class="input">{{ old('address', $customer->address ?? '') }}</textarea>
</div>
<div>
    <label>Status</label>
    <select name="status" class="input">
        @foreach(['lead', 'active', 'inactive'] as $status)
            <option value="{{ $status }}" {{ (old('status', $customer->status ?? '') == $status) ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>
