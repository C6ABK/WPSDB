<?php

namespace App\Models\Hotplate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hpcooling extends Model {
    use HasFactory;

    protected $fillable =[
        'plant',
        'product_id',
        'process_number',
        'lane',
        'height',
        'weight',
        'topscore',
        'basescore'
    ];
}
