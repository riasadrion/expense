<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(){
        return view('reports.date-range');
    }
    public function getReport(Request $request){
        // SUM(SUM(office_meal) + SUM(entertainment) + SUM(stationery) + SUM(maintenance) + SUM(mobile_bill) + SUM(import_permit) + SUM(tips) + SUM(conveyance) + SUM(gas_cylinder) + SUM(dish_bill) + SUM(medicine) + SUM(accomodation) + SUM(welfare) + SUM(store_material) + SUM(transport) + SUM(fuel_oil) + SUM(vehicle_servicing) + SUM(toll_police_case)) as admin_total,
        $from = date('Y-m-d H:i:s', strtotime($request->from));
        $to = date('Y-m-d H:i:s', strtotime($request->to));
        $data =  DB::table('expenses')
                        ->select(DB::raw('SUM(total) as total,
                            SUM(office_meal) as office_meal, 
                            SUM(entertainment) as entertainment, 
                            SUM(entertainment_warehouse) as entertainment_warehouse, 
                            SUM(stationery) as stationery, 
                            SUM(stationery_warehouse) as stationery_warehouse, 
                            SUM(maintenance) as maintenance,
                            SUM(maintenance_warehouse) as maintenance_warehouse, 
                            SUM(import_permit) as import_permit, 
                            SUM(tips) as tips, 
                            SUM(conveyance) as conveyance, 
                            SUM(conveyance_warehouse) as conveyance_warehouse, 
                            SUM(gas_cylinder) as gas_cylinder, 
                            SUM(dish_bill) as dish_bill, 
                            SUM(medicine) as medicine, 
                            SUM(medicine_warehouse) as medicine_warehouse, 
                            SUM(accomodation) as accomodation, 
                            SUM(welfare) as welfare, 
                            SUM(delivery_expense) as delivery_expense, 
                            SUM(labour_wage) as labour_wage, 
                            SUM(store_material) as store_material, 
                            SUM(store_material_warehouse) as store_material_warehouse, 
                            SUM(transport) as transport, 
                            SUM(fuel_oil) as fuel_oil, 
                            SUM(vehicle_servicing) as vehicle_servicing, 
                            SUM(toll_police_case) as toll_police_case, 
                            SUM(mobile_bill) as mobile_bill'))
                        ->whereBetween('date', [$from, $to])->first();
        return view('reports.result', compact('data', 'from', 'to'));
    }
}
