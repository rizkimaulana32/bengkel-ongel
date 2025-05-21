<?php

namespace App\Http\Controllers\User;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ItemsOrdered;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppointmentControllerUser extends Controller
{
    public function index()
    {
        $userSessionId = Auth::user();
        $appointments = Appointment::where('user_id', $userSessionId->id)->get();

        return view('client.appointment.index', compact('appointments'));
    }

    public function view($id)
    {
        $appointment = Appointment::findOrFail($id);
        $username = User::findOrFail($appointment->user_id)->name;
        return view('client.appointment.view', compact('appointment', 'username'));
    }

    public function ordered($id)
    {
        $orderedItems = ItemsOrdered::where('appointment_id', $id)->get();
        return view('client.appointment.ordered', compact('orderedItems'));
    }

    public function create()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        return view('client.appointment.create', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'date' => 'required|date',
            'descriptions' => 'required|string',
        ]);

        $appointment = Appointment::create([
            'appointment_id' => $request->appointment_id,
            'user_id' => $request->user_id,
            'date' => $request->date,
            'descriptions' => $request->descriptions,
            'status' => "Booked",
        ]);

        $cartItems = Cart::where('user_id', $request->user_id)->get();

        foreach ($cartItems as $cartItem) {
            ItemsOrdered::create([
                'appointment_id' => $appointment->appointment_id,
                'spare_part_id' => $cartItem->spare_part_id,
                'amount' => $cartItem->quantity,
            ]);
        }

        Cart::where('user_id', $request->user_id)->delete();

        return redirect()->route('client.appointment.index')
            ->with('success', 'Appointment created successfully.');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('client.appointment.edit', compact('appointment'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required',
            'date' => 'required|date',
        ]);

        $appointment = Appointment::findOrFail($request->appointment_id);

        $appointment->date = $request->date;
        $appointment->descriptions = $request->descriptions;

        $appointment->save();

        return redirect()->route('client.appointment.index')
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy($id)
    {
        $appointments = Appointment::findOrFail($id);

        $appointments->delete();

        return redirect()->route('client.appointment.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}
