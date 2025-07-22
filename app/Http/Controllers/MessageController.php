<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Notifications\CustomerMessage;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        return view('messages.create', compact('customers'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'customers' => 'required|array',
        ]);

        $details = [
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ];

        $selectedCustomers = Customer::whereIn('id', $validated['customers'])->get();

        foreach ($selectedCustomers as $customer) {
            Notification::route('mail', $customer->email)->notify(new CustomerMessage($details));
        }

        return back()->with('success', 'Messages sent!');
    }

}
