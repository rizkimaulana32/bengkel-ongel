<?php

namespace App\Http\Controllers\Admin;

use App\Models\ItemsOrdered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\SparePart;
use App\Models\User;

class ItemsOrderedController extends Controller
{
    public function index()
    {
        $itemsorder = ItemsOrdered::all();
        return view('admin.item_ordered.index', compact('itemsorder'));
    }

    public function indexAppointment($appointmentId)
    {
        if (!is_null($appointmentId)) {
            $itemsorder = ItemsOrdered::where('appointment_id', $appointmentId)->get();
        } else {
            $itemsorder = ItemsOrdered::all();
        }

        return view('admin.item_ordered.index', compact('itemsorder'));
    }

    public function view($id)
    {
        $itemsOrder = ItemsOrdered::findOrFail($id);
        $appointment = Appointment::findOrFail($itemsOrder->appointment_id);
        $user = User::findOrFail($appointment->user_id);
        $sparePart = SparePart::findOrFail($itemsOrder->spare_part_id);
        return view('admin.item_ordered.view', compact('itemsOrder', 'user', 'sparePart'));
    }

    public function selectUser()
    {
        $users = User::all();
        return view('admin.item_ordered.selectUser', compact('users'));
    }

    public function spareparts()
    {
        $spareParts = SparePart::all();
        return view('admin.item_ordered.spareparts', compact('spareParts'));
    }

    public function create($id)
    {
        $appointments = Appointment::where('user_id', $id)->get();
        $spareParts = SparePart::all();
        return view('admin.item_ordered.create', compact('appointments', 'spareParts', 'id'));
    }

    public function store(Request $request)
    {

        ItemsOrdered::create([
            'items_ordered_id' => $request->id_items_ordered,
            'appointment_id' => $request->appointment_id,
            'spare_part_id' => $request->spare_part_id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.item_ordered.index')
            ->with('success', 'Items Ordered created successfully.');
    }

    public function edit($id)
    {
        $itemsOrder = ItemsOrdered::findOrFail($id);
        return view('admin.item_ordered.edit', compact('itemsOrder'));
    }

    public function update(Request $request, $id)
    {
        $itemsOrder = ItemsOrdered::findOrFail($id);

        //belum selesai

        // Update the appointment with new data
        $itemsOrder->update($request->all());

        return redirect()->route('admin.item_ordered.index')
            ->with('success', 'Items Ordered updated successfully.');
    }

    public function destroy($id)
    {
        $itemsorder = ItemsOrdered::findOrFail($id);

        $itemsorder->delete();

        return redirect()->route('admin.item_ordered.index')
            ->with('success', 'Items Ordered deleted successfully.');
    }
}
