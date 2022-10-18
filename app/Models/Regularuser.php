<?php

namespace App\Models;

use App\Models\Hotplate\Hpmixer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regularuser extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'id_number'
    ];
}
