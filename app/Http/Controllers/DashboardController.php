<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $financialData = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(total_amount) as total_sales'),
                DB::raw('SUM(quantity) as total_parts_sold')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $months = [];
        $salesAmount = [];
        $partsSold = [];

        foreach ($financialData as $data) {
            $months[] = date("F", mktime(0, 0, 0, $data->month, 1));
            $salesAmount[] = $data->total_sales;
            $partsSold[] = $data->total_parts_sold;
        }

        return view('admin.dashboard.index', compact('months', 'salesAmount', 'partsSold'));
    }
}
