<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            [ 
                "created_by" => null,
                "total" => 85,
                "office_meal" => 5,
                "entertainment" => 5,
                "stationery" => 5,
                "maintenance" => 5,
                "conveyance" => 5,
                "gas_cylinder" => 5,
                "dish_bill" => 5,
                "medicine" => 5,
                "accomodation" => 5,
                "welfare" => 5,
                "delivery_expense" => 5,
                "labour_wage" => 5,
                "store_material" => 5,
                "transport" => 5,
                "fuel_oil" => 5,
                "vehicle_servicing" => 5,
                "toll_police_case" => 5
            ],                                                                                                                                                                                                                                                                  
        ]);
    }
}
