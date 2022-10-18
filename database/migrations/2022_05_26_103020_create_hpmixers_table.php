<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHpmixersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hpmixers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('plant');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('process_number');
            $table->decimal('water_weight', $precision = 6, $scale = 2);
            $table->decimal('water_temperature', $precision = 6, $scale = 2);
            $table->decimal('water_temperature_act', $precision = 6, $scale = 2);
            $table->decimal('batter_temperature', $precision = 6, $scale = 2);
            $table->decimal('grease_psi', $precision = 6, $scale = 2);
            $table->decimal('oven_exit_crumpet_weight', $precision = 6, $scale = 2);
            $table->decimal('hotplate_set_temperature', $precision = 6, $scale = 2);
            $table->decimal('hotplate_act_temperature', $precision = 6, $scale = 2);
            $table->decimal('internal_temperature', $precision = 6, $scale = 2);
            $table->boolean('board_brushes');
            $table->string('comments');
            $table->unsignedInteger('id_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hpmixers');
    }
}
