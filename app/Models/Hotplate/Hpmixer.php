<?php

namespace App\Models\Hotplate;

use App\Models\Regularuser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hpmixer extends Model
{
    use HasFactory;

    protected $fillable =[
        'plant',
        'product_id',
        'process_number',
        'water_weight',
        'water_temperature',
        'water_temperature_act',
        'batter_temperature',
        'grease_psi',
        'oven_exit_crumpet_weight',
        'hotplate_set_temperature',
        'hotplate_act_temperature',
        'internal_temperature',
        'board_brushes',
        'comments',
        'id_number'
    ];
}
