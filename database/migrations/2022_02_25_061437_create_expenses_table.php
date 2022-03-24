<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->integer('total')->nullable();
            $table->timestamp('date');
            $table->integer('office_meal')->nullable();
            $table->integer('entertainment')->nullable();
            $table->integer('stationery')->nullable();
            $table->integer('maintenance')->nullable();
            $table->integer('conveyance')->nullable();
            $table->integer('gas_cylinder')->nullable();
            $table->integer('dish_bill')->nullable();
            $table->integer('medicine')->nullable();
            $table->integer('accomodation')->nullable();
            $table->integer('welfare')->nullable();
            $table->integer('delivery_expense')->nullable();
            $table->integer('labour_wage')->nullable();
            $table->integer('store_material')->nullable();
            $table->integer('transport')->nullable();
            $table->integer('fuel_oil')->nullable();
            $table->integer('vehicle_servicing')->nullable();
            $table->integer('toll_police_case')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
