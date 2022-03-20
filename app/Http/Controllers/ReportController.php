<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReport(){
        $thisMonth = Expense::whereYear('date', $year)
        ->whereMonth('date', $month)
        ->sum('total');
        return view('report', compact('thisMonth', 'prevMonth', 'thisYear'));
    }
}
