<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_tables', function (Blueprint $table) {
            $table->increments('restaurant_table_id');
            $table->string('restaurant_table_entry_id')->nullable();
            $table->string('restaurant_table_name')->nullable();
            $table->longText('restaurant_table_description')->nullable();
            $table->bigInteger('restaurant_table_status')->default(1);
            $table->string('restaurant_table_availability')->nullable();
            $table->string('restaurant_table_create_date')->nullable();
            $table->string('restaurant_table_has_deleted')->default('NO');
            $table->bigInteger('restaurant_table_created_by')->nullable();
            $table->bigInteger('restaurant_table_deleted_by')->nullable();
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
        Schema::dropIfExists('restaurant_tables');
    }
}
