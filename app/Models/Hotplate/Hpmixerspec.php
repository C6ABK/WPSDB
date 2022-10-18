<?php

namespace App\Models\Hotplate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hpmixerspec extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id',
        'water_weight_low',
        'water_weight_high',
        'water_temperature_low',
        'water_temperature_high',
        'water_temperature_act_low',
        'water_temperature_act_high',
        'batter_temperature_low',
        'batter_temperature_high',
        'grease_psi_low',
        'grease_psi_high',
        'oven_exit_crumpet_weight_low',
        'oven_exit_crumpet_weight_high',
        'hotplate_set_temperature_low',
        'hotplate_set_temperature_high',
        'hotplate_act_temperature_low',
        'hotplate_act_temperature_high',
        'internal_temperature_low',
        'internal_temperature_high'
    ];
}
