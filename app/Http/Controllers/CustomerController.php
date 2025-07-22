<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CustomerMessageNotification;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'status' => 'required|in:Lead,Active,Inactive',
        ]);
    
        Customer::create($validated);
        $customer = new Customer($request->all());
        $customer->user_id = auth()->id();
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required',
            'contact' => 'required|string|max:20',
            'address' => 'nullable|string',
            'status'  => 'required|in:Lead,Active,Inactive',
        ]);
    
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
    
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendMessage($id)
    {
        $customer = Customer::findOrFail($id);

        $message = "Hello {$customer->name}, this is a message from CRM.";

        // Send notification (assuming you have a Notification set up)
        Notification::route('mail', $customer->email)->notify(new CustomerMessageNotification($message));

        return redirect()->route('customers.index')->with('success', 'Message sent successfully');
    }

    public function sendBulkMessage(Request $request)
    {
        $request->validate(['message' => 'required|string']);

        $customers = Customer::all();

        foreach ($customers as $customer) {
            Notification::route('mail', $customer->email)
                ->notify(new CustomerMessageNotification($request->message));
        }

        return redirect()->back()->with('success', 'Message sent to all customers.');
    }

    public function sendMessageAll()
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            $message = "Hello {$customer->name}, this is a message from CRM.";

            Notification::route('mail', $customer->email)
                ->notify(new CustomerMessageNotification($message));
        }

        return redirect()->back()->with('success', 'Message sent to all customers successfully.');
    }

}
