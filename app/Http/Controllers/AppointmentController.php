<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function show(User $user)
    {
        return view('user.appointment', [
            'user' => $user,
        ]);
    }

    public function submit(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'service_id' => 'required|exists:services,id',
            'starts_at' => 'required|date',
        ]);

        $customer = Customer::firestOrCreate([
            'user_id' => $user->id,
            'email' => $request->input('email')
        ], [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
        ]);

        $appointment = Appointment::create([
            'customer_id' => $customer->id,
            'service_id' => $request->input('service_id'),
            'starts_at' => $request->input('starts_at'),
            'additional_notes' => $request->input('additional_notes'),
        ]);

        return view('user.success', [
            'status' => 'Appointment booked successfully',
        ]);
    }
}
