<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheduler extends Model
{
    use HasFactory;
    protected $fillable = [
        'sequence_number',
        'run_number',
        'process_number',
        'product_id',
        'sales_date',
        'active'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
