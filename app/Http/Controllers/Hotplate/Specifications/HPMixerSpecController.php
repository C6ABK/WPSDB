<?php

namespace App\Http\Controllers\Hotplate\Specifications;

use App\Http\Controllers\Controller;
use App\Models\Hotplate\Hpmixerspec;
use App\Models\Product;
use Illuminate\Http\Request;

class HPMixerSpecController extends Controller {
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        // Get products
        $products = Product::where('products.plant', '=', 'HP')->where('products.type', '=', 'Mix')->get();

        return view('hotplate.specifications.hpmixerspec', [
            'products' => $products
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'product_id' => 'required|unique:hpmixerspecs',
            'water_weight_low' => 'required|lte:water_weight_high',
            'water_weight_high' => 'required|gte:water_weight_low',
            'water_temperature_low' => 'required|lte:water_temperature_high',
            'water_temperature_high' => 'required|gte:water_temperature_low',
            'water_temperature_act_low' => 'required|lte:water_temperature_act_high',
            'water_temperature_act_high' => 'required|gte:water_temperature_act_low',
            'batter_temperature_low' => 'required|lte:batter_temperature_high',
            'batter_temperature_high' => 'required|gte:batter_temperature_low',
            'grease_psi_low' => 'required|lte:grease_psi_high',
            'grease_psi_high' => 'required|gte:grease_psi_low',
            'oven_exit_crumpet_weight_low' => 'required|lte:oven_exit_crumpet_weight_high',
            'oven_exit_crumpet_weight_high' => 'required|gte:oven_exit_crumpet_weight_low',
            'hotplate_set_temperature_low' => 'required|lte:hotplate_set_temperature_high',
            'hotplate_set_temperature_high' => 'required|gte:hotplate_set_temperature_low',
            'hotplate_act_temperature_low' => 'required|lte:hotplate_act_temperature_high',
            'hotplate_act_temperature_high' => 'required|gte:hotplate_act_temperature_low',
            'internal_temperature_low' => 'required|lte:internal_temperature_high',
            'internal_temperature_high' => 'required|gte:internal_temperature_low'
        ], [
            'water_temperature_low.required' => 'The Water Temp Low field is required.',
            'water_temperature_high.required' => 'The Water Temp High field is required.',
            'water_temperature_act_low.required' => 'The Water Temp ACT Low field is required.',
            'water_temperature_act_high.required' => 'The Water Temp ACT High field is required.',
            'batter_temperature_low.required' => 'The Batter Temp Low field is required.',
            'batter_temperature_high.required' => 'The Batter Temp High field is required',
            'oven_exit_crumpet_weight_low.required' => 'The Oven Exit Weight Low field is required.',
            'oven_exit_crumpet_weight_high.required' => 'The Oven Exit Weight High field is required.',
            'hotplate_set_temperature_low.required' => 'The SET Temp Low field is required.',
            'hotplate_set_temperature_high.required' => 'The SET Temp High field is required.',
            'hotplate_act_temperature_low.required' => 'The ACT Temp Low field is required.',
            'hotplate_act_temperature_high.required' => 'The ACT Temp High field is required.'
        ]);

        Hpmixerspec::create([
            'product_id' => $request->product_id,
            'water_weight_low' => $request->water_weight_low,
            'water_weight_high' => $request->water_weight_high,
            'water_temperature_low' => $request->water_temperature_low,
            'water_temperature_high' => $request->water_temperature_high,
            'water_temperature_act_low' => $request->water_temperature_act_low,
            'water_temperature_act_high' => $request->water_temperature_act_high,
            'batter_temperature_low' => $request->batter_temperature_low,
            'batter_temperature_high' => $request->batter_temperature_high,
            'grease_psi_low' => $request->grease_psi_low,
            'grease_psi_high' => $request->grease_psi_high,
            'oven_exit_crumpet_weight_low' => $request->oven_exit_crumpet_weight_low,
            'oven_exit_crumpet_weight_high' => $request->oven_exit_crumpet_weight_high,
            'hotplate_set_temperature_low' => $request->hotplate_set_temperature_low,
            'hotplate_set_temperature_high' => $request->hotplate_set_temperature_high,
            'hotplate_act_temperature_low' => $request->hotplate_act_temperature_low,
            'hotplate_act_temperature_high' => $request->hotplate_act_temperature_high,
            'internal_temperature_low' => $request->internal_temperature_low,
            'internal_temperature_high' => $request->internal_temperature_high
        ]);

        return redirect()->route('hotplate.specifications.hpmixerspec');
    }
}
