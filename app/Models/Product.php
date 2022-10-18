<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_title',
        'plant',
        'type',
        'active'
    ];

    public function schedulers(){
        return $this->hasMany(scheduler::class, 'product_id');
    }
}
