<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show(User $user)
    {
        return view('user.message', [
            'user' => $user,
        ]);
    }

    public function submit(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required'
        ]);
        $customer = Customer::firstOrCreate([
            'user_id' => $user->id,
            'email' => $request->input('email')
        ], [
            'first_name' => $request->input('first_name'),
        ]);

        $message = $user->messages()->create([
            'customer_id' => $customer->id,
            'details' => $request->input('details'),
        ]);

        return view('user.success', [
            'status' => 'Message sent successfully',
        ]);
    }
}
