<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){
        $month = date('m');
        $lastMonth = date("Y-m-d H:i:s", strtotime("-1 month"));
        $year = date('Y');

        $thisMonth = Expense::whereYear('date', $year)
        ->whereMonth('date', $month)
        ->sum('total');

        $thisYear = Expense::whereYear('date', $year)
        ->sum('total');

        $prevMonth = Expense::whereYear('date', $year)
        ->whereMonth('date', $lastMonth)
        ->sum('total');

        return view('dashboard', compact('thisMonth', 'prevMonth', 'thisYear'));
    }
}
