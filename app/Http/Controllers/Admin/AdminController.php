<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SparePart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $spareParts = SparePart::all();

        $sales = Order::select(
            DB::raw('sum(amount) as total_amount'),
            DB::raw('sum(quantity) as total_sold'),
            DB::raw("DATE_FORMAT(created_at, '%M %Y') as month")
        )
            ->groupBy('month')
            ->get();

        $months = $sales->pluck('month');
        $salesAmount = $sales->pluck('total_amount');
        $partsSold = $sales->pluck('total_sold');

        return view('admin.dashboard', compact('spareParts', 'months', 'salesAmount', 'partsSold'));
    }
}
