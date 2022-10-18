<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHpmixerspecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hpmixerspecs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('product_id')->unique()->foreign();
            $table->decimal('water_weight_low', $precision = 6, $scale = 2);
            $table->decimal('water_weight_high', $precision = 6, $scale = 2);
            $table->decimal('water_temperature_low', $precision = 6, $scale = 2);
            $table->decimal('water_temperature_high', $precision = 6, $scale = 2);
            $table->decimal('water_temperature_act_low', $precision = 6, $scale = 2);
            $table->decimal('water_temperature_act_high', $precision = 6, $scale = 2);
            $table->decimal('batter_temperature_low', $precision = 6, $scale = 2);
            $table->decimal('batter_temperature_high', $precision = 6, $scale = 2);
            $table->decimal('grease_psi_low', $precision = 6, $scale = 2);
            $table->decimal('grease_psi_high', $precision = 6, $scale = 2);
            $table->decimal('oven_exit_crumpet_weight_low', $precision = 6, $scale = 2);
            $table->decimal('oven_exit_crumpet_weight_high', $precision = 6, $scale = 2);
            $table->decimal('hotplate_set_temperature_low', $precision = 6, $scale = 2);
            $table->decimal('hotplate_set_temperature_high', $precision = 6, $scale = 2);
            $table->decimal('hotplate_act_temperature_low', $precision = 6, $scale = 2);
            $table->decimal('hotplate_act_temperature_high', $precision = 6, $scale = 2);
            $table->decimal('internal_temperature_low', $precision = 6, $scale = 2);
            $table->decimal('internal_temperature_high', $precision = 6, $scale = 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hpmixerspecs');
    }
}
