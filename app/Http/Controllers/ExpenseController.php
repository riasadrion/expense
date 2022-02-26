<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm"></a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm"></a>';
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'date' => 'required|unique:expenses|before:tomorrow',
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
        $expense->created_at = $request->created_at;
        // $expense->created_by = Auth::user()->id;
        if($expense->save()){
            return redirect()->route('expenses.index');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
