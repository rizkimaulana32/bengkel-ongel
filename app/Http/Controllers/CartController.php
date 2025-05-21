<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SparePart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::where('user_id', $user_id)->get();

        return view('cart.index', compact('carts'));
    }

    public function create(SparePart $sparePart)
    {
        return view('cart.create', compact('sparePart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'spare_part_id' => 'required|exists:spare_parts,spare_part_id',
            'amount' => 'required|integer|min:1',
        ]);

        $sparePartId = $request->input('spare_part_id');
        $amount = $request->input('amount');
        $sparePart = SparePart::findOrFail($sparePartId);

        if ($sparePart->stock < $amount) {
            return redirect()->back()->with('error', 'Not enough stock available')->withInput();
        }

        $userId = auth()->user()->id;
        $cartItem = Cart::where('user_id', $userId)
            ->where('spare_part_id', $sparePartId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $amount;
            $cartItem->save();
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = $userId;
            $cartItem->spare_part_id = $sparePartId;
            $cartItem->quantity = $amount;
            $cartItem->save();
        }

        $sparePart->decrement('stock', $amount);

        return redirect()->route('cart.index')->with('success', 'Item added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:increase,decrease',
        ]);

        $cart = Cart::findOrFail($id);
        $sparePart = SparePart::findOrFail($cart->spare_part_id);

        if ($request->action === 'increase') {
            $cart->quantity += 1;
            $sparePart->decrement('stock');
        } elseif ($request->action === 'decrease') {
            if ($cart->quantity > 1) {
                $cart->quantity -= 1;
                $sparePart->increment('stock');
            }
        }

        $cart->save();
        $sparePart->save();

        return redirect()->back()->with('success', 'Cart item updated successfully.');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $sparePart = SparePart::findOrFail($cart->spare_part_id);

        $sparePart->increment('stock', $cart->quantity);
        $cart->delete();

        return redirect()->back()->with('success', 'Cart item removed successfully.');
    }
}
