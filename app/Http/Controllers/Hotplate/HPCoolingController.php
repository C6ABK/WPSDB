<?php

namespace App\Http\Controllers\Hotplate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\scheduler;


class HPCoolingController extends Controller {
    public function index(){
        // Get products
        $products = scheduler::join('products', 'products.product_id', '=', 'schedulers.product_id')
        ->where('products.plant', '=', 'HP')->where('products.type', '=', 'Mix')->get();

        $mixes = Hpmixer::orderBy('hpmixers.created_at', 'DESC')->rightJoin('regularusers', 'hpmixers.id_number', '=', 'regularusers.id_number')
        ->select('hpmixers.*','regularusers.first_name','regularusers.last_name')->get();

        return view('hotplate.cooling', [
            'products' => $products,
            'mixes' => $mixes,
        ]);
    }
}
