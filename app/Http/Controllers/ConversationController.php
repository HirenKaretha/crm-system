<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Customer;
use Carbon\Carbon;

class ConversationController extends Controller
{
    public function create($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        return view('conversations.create', compact('customer'));
    }

    public function store(Request $request, $customerId)
    {
        $request->validate([
            'time' => ['required', 'date'], // block absurd years
            'medium' => 'required|string',
            'notes' => 'nullable|string',
        ]);
        Conversation::create([
            'customer_id' => $customerId,
            'communication_time' => Carbon::parse($request->time),
            'medium' => $request->medium,
            'notes' => $request->notes,
        ]);

        return redirect()->route('customers.show', $customerId)->with('success', 'Conversation added.');
    }
}
