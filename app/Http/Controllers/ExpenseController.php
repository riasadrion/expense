<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
Use Alert;
class ExpenseController extends Controller
{
    public function index()
    {
        return view('expenses');
    }
    
    public function getExpenses(Request $request){
        if ($request->ajax()) {
            $data = Expense::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('expenses.edit', ['expense' => $row->id]).'" class="edit btn btn-success btn-sm"></a> <a href="'.route('expenses.delete', ['expense' => $row->id]).'" class="delete btn btn-danger btn-sm"></a>';
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
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'office_meal' => 'numeric|nullable',
            'entertainment' => 'numeric|nullable',
            'stationery' => 'numeric|nullable',
            'maintenance' => 'numeric|nullable',
            'conveyance' => 'numeric|nullable',
            'gas_cylinder' => 'numeric|nullable',
            'dish_bill' => 'numeric|nullable',
            'medicine' => 'numeric|nullable',
            'accomodation' => 'numeric|nullable',
            'welfare' => 'numeric|nullable',
            'delivery_expense' => 'numeric|nullable',
            'labour_wage' => 'numeric|nullable',
            'store_material' => 'numeric|nullable',
            'transport' => 'numeric|nullable',
            'fuel_oil' => 'numeric|nullable',
            'vehicle_servicing' => 'numeric|nullable',
            'toll_police_case' => 'numeric|nullable',
            'date' => 'required|before:tomorrow|after:-1 week',
        ]);

        $expense = new Expense;
        $expense->office_meal = $request->office_meal;
        $expense->entertainment = $request->entertainment;
        $expense->stationery = $request->stationery;
        $expense->maintenance = $request->maintenance;
        $expense->conveyance = $request->conveyance;
        $expense->gas_cylinder = $request->gas_cylinder;
        $expense->dish_bill = $request->dish_bill;
        $expense->medicine = $request->medicine;
        $expense->accomodation = $request->accomodation;
        $expense->welfare = $request->welfare;
        $expense->delivery_expense = $request->delivery_expense;
        $expense->labour_wage = $request->labour_wage;
        $expense->store_material = $request->store_material;
        $expense->transport = $request->transport;
        $expense->fuel_oil = $request->fuel_oil;
        $expense->vehicle_servicing = $request->vehicle_servicing;
        $expense->toll_police_case = $request->toll_police_case;
        $timestamp = date('Y-m-d H:i:s', strtotime($request->date));
        $expense->date = $timestamp;

        $expense->total = $request->office_meal + $request->entertainment + $request->stationery + $request->maintenance + $request->conveyance + $request->gas_cylinder + $request->dish_bill + $request->medicine + $request->accomodation + $request->welfare + $request->delivery_expense + $request->labour_wage + $request->store_material + $request->transport + $request->fuel_oil + $request->vehicle_servicing + $request->toll_police_case;
         
        // $expense->created_by = Auth::user()->id;
        $ifExistsDate = Expense::where('date', $timestamp)->first();
        if($ifExistsDate && $ifExistsDate->id != $expense->id){
            toast('Duplicate date entry!','error');
            return back();
        }else{
           if($expense->save()){
                toast('Updated Successfully!','success');
                return back();
            } 
        }
    }

    public function show(Expense $expense)
    {
        //
    }

    public function edit(Expense $expense)
    {
        return view('edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'office_meal' => 'numeric|nullable',
            'entertainment' => 'numeric|nullable',
            'stationery' => 'numeric|nullable',
            'maintenance' => 'numeric|nullable',
            'conveyance' => 'numeric|nullable',
            'gas_cylinder' => 'numeric|nullable',
            'dish_bill' => 'numeric|nullable',
            'medicine' => 'numeric|nullable',
            'accomodation' => 'numeric|nullable',
            'welfare' => 'numeric|nullable',
            'delivery_expense' => 'numeric|nullable',
            'labour_wage' => 'numeric|nullable',
            'store_material' => 'numeric|nullable',
            'transport' => 'numeric|nullable',
            'fuel_oil' => 'numeric|nullable',
            'vehicle_servicing' => 'numeric|nullable',
            'toll_police_case' => 'numeric|nullable',
            'date' => 'required|before:tomorrow|after:-1 week',
        ]);

        $expense->office_meal = $request->office_meal;
        $expense->entertainment = $request->entertainment;
        $expense->stationery = $request->stationery;
        $expense->maintenance = $request->maintenance;
        $expense->conveyance = $request->conveyance;
        $expense->gas_cylinder = $request->gas_cylinder;
        $expense->dish_bill = $request->dish_bill;
        $expense->medicine = $request->medicine;
        $expense->accomodation = $request->accomodation;
        $expense->welfare = $request->welfare;
        $expense->delivery_expense = $request->delivery_expense;
        $expense->labour_wage = $request->labour_wage;
        $expense->store_material = $request->store_material;
        $expense->transport = $request->transport;
        $expense->fuel_oil = $request->fuel_oil;
        $expense->vehicle_servicing = $request->vehicle_servicing;
        $expense->toll_police_case = $request->toll_police_case;
        $timestamp = date('Y-m-d H:i:s', strtotime($request->date));
        $expense->date = $timestamp;

        $expense->total = $request->office_meal + $request->entertainment + $request->stationery + $request->maintenance + $request->conveyance + $request->gas_cylinder + $request->dish_bill + $request->medicine + $request->accomodation + $request->welfare + $request->delivery_expense + $request->labour_wage + $request->store_material + $request->transport + $request->fuel_oil + $request->vehicle_servicing + $request->toll_police_case;
         
        // $expense->created_by = Auth::user()->id;
        $ifExistsDate = Expense::where('date', $timestamp)->first();
        if($ifExistsDate && $ifExistsDate->id != $expense->id){
            toast('Duplicate date entry!','error');
            return back();
        }else{
           if($expense->save()){
                toast('Updated Successfully!','success');
                return back();
            } 
        }
    }

    public function destroy(Expense $expense)
    {
        if($expense->delete()){
            toast('Deleted Successfully!','error');
            return back();
        }else{
            toast('Failed!','error');
            return back();
        }
    }
}
