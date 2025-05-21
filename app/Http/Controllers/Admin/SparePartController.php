<?php

namespace App\Http\Controllers\Admin;

use App\Models\SparePart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SparePartController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('perPage', 5);

        $spareParts = SparePart::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        })->paginate($perPage);
        return view('admin.spare_parts.index', compact('spareParts'));
    }

    public function homepage()
    {
        $spareParts = SparePart::inRandomOrder()->limit(10)->get();
        return view('welcome', compact('spareParts'));
    }

    public function view($id)
    {
        $sparePart = SparePart::findOrFail($id);
        return view('admin.spare_parts.view', compact('sparePart'));
    }

    public function details($id)
    {
        $sparePart = SparePart::findOrFail($id);
        $spareparts = SparePart::inRandomOrder()->limit(4)->get();
        return view('client.sparepart.details', compact('sparePart', 'spareparts'));
    }

    public function detailsAdmin($id)
    {
        $sparePart = SparePart::findOrFail($id);
        $spareparts = SparePart::inRandomOrder()->limit(4)->get();
        return view('admin.spare_parts.details', compact('sparePart', 'spareparts'));
    }

    public function create()
    {
        return view('admin.spare_parts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'spare_part_id' => 'required|integer|unique:spare_parts',
            'name' => 'required|string|max:50',
            'stock' => 'required|integer',
            'entry_date' => 'required|date',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imageName = null;
        if ($request->hasFile('picture')) {
            $imageName = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->storeAs('public/spare_parts', $imageName);
        }

        SparePart::create([
            'spare_part_id' => $request->spare_part_id,
            'name' => $request->name,
            'stock' => $request->stock,
            'entry_date' => $request->entry_date,
            'description' => $request->description,
            'price' => $request->price,
            'picture' => $imageName,
        ]);

        return redirect()->route('admin.spare_parts.index')
            ->with('success', 'Spare Part created successfully.');
    }

    public function edit($id)
    {
        $sparePart = SparePart::findOrFail($id);
        return view('admin.spare_parts.edit', compact('sparePart'));
    }

    public function update(Request $request, $id)
    {
        $sparePart = SparePart::findOrFail($id);

        $request->validate([
            'spare_part_id' => 'required|integer|unique:spare_parts,spare_part_id,' . $sparePart->spare_part_id . ',spare_part_id',
            'name' => 'required|string|max:50',
            'stock' => 'required|integer',
            'entry_date' => 'required|date',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $imageName = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->storeAs('public/spare_parts', $imageName);
            if ($sparePart->picture && file_exists(storage_path("app/public/spare_parts/{$sparePart->picture}"))) {
                unlink(storage_path("app/public/spare_parts/{$sparePart->picture}"));
            }
            $sparePart->picture = $imageName;
        }

        $sparePart->spare_part_id = $request->spare_part_id;
        $sparePart->name = $request->name;
        $sparePart->description = $request->description;
        $sparePart->price = $request->price;
        $sparePart->stock = $request->stock;
        $sparePart->entry_date = $request->entry_date;
        $sparePart->save();

        return redirect()->route('admin.spare_parts.index')
            ->with('success', 'Spare Part updated successfully.');
    }

    public function destroy($id)
    {
        $sparePart = SparePart::findOrFail($id);

        if ($sparePart->picture && file_exists(storage_path("app/public/spare_parts/{$sparePart->picture}"))) {
            unlink(storage_path("app/public/spare_parts/{$sparePart->picture}"));
        }

        $sparePart->delete();

        return redirect()->route('admin.spare_parts.index')
            ->with('success', 'Spare Part deleted successfully.');
    }
}
