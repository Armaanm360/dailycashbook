<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRestaurantTableIdToInvoicePosSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_pos_sales', function (Blueprint $table) {
            $table->string('restaurant_table_id')->null()->after('staff_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_pos_sales', function (Blueprint $table) {
            $table->dropColumn(['restaurant_table_id']);
        });
    }
}
