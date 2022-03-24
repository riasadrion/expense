<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
Use Alert;
class ExpenseController extends Controller
{
    public function index()
    {
        return view('expenses.index');
    }

    public function warehouseExpense()
    {
        return view('expenses.warehouse');
    }
    
    public function getExpenses(Request $request){
        // dd($request->userType);
        if ($request->ajax()) {
            $data = Expense::where('dept_id', 1)->get();;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) use($request){
                    if($request->userType == 1){
                        $actionBtn = '<a href="'.route('expenses.edit', ['expense' => $row->id]).'" class="edit btn btn-success btn-sm"></a> <a href="'.route('expenses.delete', ['expense' => $row->id]).'" class="delete btn btn-danger btn-sm"></a>';
                    }elseif($request->userType == 2){
                        $actionBtn = '<a href="'.route('expenses.edit', ['expense' => $row->id]).'" class="edit btn btn-success btn-sm"></a>';
                    }else{
                        $actionBtn = "";
                    }
                    return $actionBtn;
                })
                ->editColumn('date', function ($row) {
                    return Carbon::parse($row->date)->format('d/m/Y');
                })
                ->escapeColumns('date')
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function getWarehouse(Request $request){
        // dd($request->userType);
        if ($request->ajax()) {
            $data = Expense::where('dept_id', 2)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) use($request){
                    if($request->userType == 1){
                        $actionBtn = '<a href="'.route('edit.warehouse.expense', ['expense' => $row->id]).'" class="edit btn btn-success btn-sm"></a> <a href="'.route('expenses.delete', ['expense' => $row->id]).'" class="delete btn btn-danger btn-sm"></a>';
                    }elseif($request->userType == 2){
                        $actionBtn = '<a href="'.route('edit.warehouse.expense', ['expense' => $row->id]).'" class="edit btn btn-success btn-sm"></a>';
                    }else{
                        $actionBtn = "";
                    }
                    return $actionBtn;
                })
                ->editColumn('date', function ($row) {
                    return Carbon::parse($row->date)->format('d/m/Y');
                })
                ->escapeColumns('date')
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('expenses.create');
    }
    public function createWarehouse()
    {
        return view('expenses.create-warehouse');
    }

    public function store(Request $request)
    {
        $request->validate([
            'office_meal' => 'numeric|nullable',
            'entertainment' => 'numeric|nullable',
            'entertainment_warehouse' => 'numeric|nullable',
            'stationery' => 'numeric|nullable',
            'stationery_warehouse' => 'numeric|nullable',
            'maintenance' => 'numeric|nullable',
            'maintenance_warehouse' => 'numeric|nullable',
            'import_permit' => 'numeric|nullable',
            'tips' => 'numeric|nullable',
            'conveyance' => 'numeric|nullable',
            'conveyance_warehouse' => 'numeric|nullable',
            'gas_cylinder' => 'numeric|nullable',
            'dish_bill' => 'numeric|nullable',
            'medicine' => 'numeric|nullable',
            'medicine_warehouse' => 'numeric|nullable',
            'accomodation' => 'numeric|nullable',
            'welfare' => 'numeric|nullable',
            'delivery_expense' => 'numeric|nullable',
            'labour_wage' => 'numeric|nullable',
            'store_material' => 'numeric|nullable',
            'store_material_warehouse' => 'numeric|nullable',
            'transport' => 'numeric|nullable',
            'fuel_oil' => 'numeric|nullable',
            'vehicle_servicing' => 'numeric|nullable',
            'toll_police_case' => 'numeric|nullable',
            'mobile_bill' => 'numeric|nullable',
            'legal_fees' => 'numeric|nullable',
            'donation' => 'numeric|nullable',
            'it_accessories' => 'numeric|nullable',
            'parking_bill' => 'numeric|nullable',
            'date' => 'required|before:tomorrow|after:-15 days',
        ]);

        $expense = new Expense;
        $expense->dept_id = $request->dept_id;
        $expense->office_meal = $request->office_meal;
        $expense->entertainment = $request->entertainment;
        $expense->entertainment_warehouse = $request->entertainment_warehouse;
        $expense->stationery = $request->stationery;
        $expense->stationery_warehouse = $request->stationery_warehouse;
        $expense->medicine = $request->medicine;
        $expense->medicine_warehouse = $request->medicine_warehouse;
        $expense->conveyance = $request->conveyance;
        $expense->conveyance_warehouse = $request->conveyance_warehouse;
        $expense->store_material = $request->store_material;
        $expense->store_material_warehouse = $request->store_material_warehouse;
        $expense->maintenance = $request->maintenance;
        $expense->maintenance_warehouse = $request->maintenance_warehouse;
        $expense->import_permit = $request->import_permit;
        $expense->tips = $request->tips;
        $expense->gas_cylinder = $request->gas_cylinder;
        $expense->dish_bill = $request->dish_bill;
        $expense->accomodation = $request->accomodation;
        $expense->welfare = $request->welfare;
        $expense->delivery_expense = $request->delivery_expense;
        $expense->labour_wage = $request->labour_wage;
        $expense->transport = $request->transport;
        $expense->fuel_oil = $request->fuel_oil;
        $expense->vehicle_servicing = $request->vehicle_servicing;
        $expense->toll_police_case = $request->toll_police_case;
        $expense->mobile_bill = $request->mobile_bill;
        $expense->legal_fees = $request->legal_fees;
        $expense->donation = $request->donation;
        $expense->it_accessories = $request->it_accessories;
        $expense->parking_bill = $request->parking_bill;
        $expense->created_by = Auth::user()->id;
        $timestamp = date('Y-m-d H:i:s', strtotime($request->date));
        $expense->date = $timestamp;

        $expense->total = $request->office_meal + $request->entertainment + $request->entertainment_warehouse + $request->stationery + $request->stationery_warehouse + $request->maintenance + $request->import_permit + $request->tips + $request->conveyance + $request->conveyance_warehouse + $request->gas_cylinder + $request->dish_bill + $request->medicine + $request->medicine_warehouse + $request->accomodation + $request->welfare + $request->delivery_expense + $request->labour_wage + $request->store_material + $request->store_material_warehouse + $request->transport + $request->fuel_oil + $request->vehicle_servicing + $request->toll_police_case + $request->maintenance_warehouse + $request->mobile_bill + $request->legal_fees + $request->donation + $request->it_accessories + $request->parking_bill;
        if($expense->save()){
            toast('Added Successfully!','success');
            return back();
        }
        // $ifExistsDate = Expense::where('date', $timestamp)->first();
        // if($ifExistsDate && $ifExistsDate->id != $expense->id){
        //     toast('Duplicate date entry!','error');
        //     return back();
        // }else{
        //    if($expense->save()){
        //         toast('Added Successfully!','success');
        //         return back();
        //     } 
        // }
    }

    public function show(Expense $expense)
    {
        //
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function editWarehouse(Expense $expense)
    {
        return view('expenses.edit-warehouse', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'office_meal' => 'numeric|nullable',
            'entertainment' => 'numeric|nullable',
            'entertainment_warehouse' => 'numeric|nullable',
            'stationery' => 'numeric|nullable',
            'stationery_warehouse' => 'numeric|nullable',
            'maintenance' => 'numeric|nullable',
            'maintenance_warehouse' => 'numeric|nullable',
            'import_permit' => 'numeric|nullable',
            'tips' => 'numeric|nullable',
            'conveyance' => 'numeric|nullable',
            'conveyance_warehouse' => 'numeric|nullable',
            'gas_cylinder' => 'numeric|nullable',
            'dish_bill' => 'numeric|nullable',
            'medicine' => 'numeric|nullable',
            'medicine_warehouse' => 'numeric|nullable',
            'accomodation' => 'numeric|nullable',
            'welfare' => 'numeric|nullable',
            'delivery_expense' => 'numeric|nullable',
            'labour_wage' => 'numeric|nullable',
            'store_material' => 'numeric|nullable',
            'store_material_warehouse' => 'numeric|nullable',
            'transport' => 'numeric|nullable',
            'fuel_oil' => 'numeric|nullable',
            'vehicle_servicing' => 'numeric|nullable',
            'toll_police_case' => 'numeric|nullable',
            'mobile_bill' => 'numeric|nullable',
            'legal_fees' => 'numeric|nullable',
            'donation' => 'numeric|nullable',
            'it_accessories' => 'numeric|nullable',
            'parking_bill' => 'numeric|nullable',
            'date' => 'required|before:tomorrow|after:-15 days',
        ]);

        $expense->office_meal = $request->office_meal;
        $expense->entertainment = $request->entertainment;
        $expense->entertainment_warehouse = $request->entertainment_warehouse;
        $expense->stationery = $request->stationery;
        $expense->stationery_warehouse = $request->stationery_warehouse;
        $expense->medicine = $request->medicine;
        $expense->medicine_warehouse = $request->medicine_warehouse;
        $expense->conveyance = $request->conveyance;
        $expense->conveyance_warehouse = $request->conveyance_warehouse;
        $expense->store_material = $request->store_material;
        $expense->store_material_warehouse = $request->store_material_warehouse;
        $expense->maintenance = $request->maintenance;
        $expense->maintenance_warehouse = $request->maintenance_warehouse;
        $expense->import_permit = $request->import_permit;
        $expense->tips = $request->tips;
        $expense->gas_cylinder = $request->gas_cylinder;
        $expense->dish_bill = $request->dish_bill;
        $expense->accomodation = $request->accomodation;
        $expense->welfare = $request->welfare;
        $expense->delivery_expense = $request->delivery_expense;
        $expense->labour_wage = $request->labour_wage;
        $expense->transport = $request->transport;
        $expense->fuel_oil = $request->fuel_oil;
        $expense->vehicle_servicing = $request->vehicle_servicing;
        $expense->toll_police_case = $request->toll_police_case;
        $expense->mobile_bill = $request->mobile_bill;
        $expense->legal_fees = $request->legal_fees;
        $expense->donation = $request->donation;
        $expense->it_accessories = $request->it_accessories;
        $expense->parking_bill = $request->parking_bill;
        $timestamp = date('Y-m-d H:i:s', strtotime($request->date));
        $expense->date = $timestamp;

        $expense->total = $request->office_meal + $request->entertainment + $request->entertainment_warehouse + $request->stationery + $request->stationery_warehouse + $request->maintenance + $request->import_permit + $request->tips + $request->conveyance + $request->conveyance_warehouse + $request->gas_cylinder + $request->dish_bill + $request->medicine + $request->medicine_warehouse + $request->accomodation + $request->welfare + $request->delivery_expense + $request->labour_wage + $request->store_material + $request->store_material_warehouse + $request->transport + $request->fuel_oil + $request->vehicle_servicing + $request->toll_police_case + $request->maintenance_warehouse + $request->mobile_bill + $request->legal_fees + $request->donation + $request->it_accessories + $request->parking_bill;
         if($expense->save()){
            toast('Updated Successfully!','success');
            return back();
        }
        // $expense->created_by = Auth::user()->id;
        // $ifExistsDate = Expense::where('date', $timestamp)->first();
        // if($ifExistsDate && $ifExistsDate->id != $expense->id){
        //     toast('Duplicate date entry!','error');
        //     return back();
        // }else{
        //    if($expense->save()){
        //         toast('Updated Successfully!','success');
        //         return back();
        //     } 
        // }
    }

    public function destroy(Expense $expense)
    {
        if($expense->delete()){
            toast('Deleted Successfully!','warning');
            return back();
        }else{
            toast('Failed!','warning');
            return back();
        }
    }
}
