<?php

namespace App\Http\Controllers\Hotplate;

use App\Http\Controllers\Controller;
use App\Models\Hotplate\Hpmixer;
use App\Models\Hotplate\Hpmixerspec;
use App\Models\Product;
use App\Models\scheduler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HPMixerController extends Controller {
    public function index(){
        // Get products
        $products = scheduler::join('products', 'products.product_id', '=', 'schedulers.product_id')
        ->where('products.plant', '=', 'HP')->where('products.type', '=', 'Mix')->get();

        $mixes = Hpmixer::orderBy('hpmixers.created_at', 'DESC')->rightJoin('regularusers', 'hpmixers.id_number', '=', 'regularusers.id_number')
        ->select('hpmixers.*','regularusers.first_name','regularusers.last_name')->get();

        return view('hotplate.mixer', [
            'products' => $products,
            'mixes' => $mixes,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'plant' => 'required',
            'select_product' => 'required',
            'water_weight' => 'required',
            'water_temperature' => 'required',
            'water_temperature_act' => 'required',
            'batter_temperature' => 'required',
            'grease_psi' => 'required',
            'oven_exit_crumpet_weight' => 'required',
            'hotplate_set_temperature' => 'required',
            'hotplate_act_temperature' => 'required',
            'internal_temperature' => 'required',
            'board_brushes' => 'required',
            'user_id' => 'required|exists:regularusers,id_number'
        ], [
            'user_id.exists' => 'User ID not found'
        ]);

        // Get both process no and product id from dropdown - array of two values
        $product_explode = explode('|', $request->select_product);

        $specification = Hpmixerspec::where('product_id', '=', $product_explode[1])->get();

        $rangeError = "";

        // Range Validations ----------------------------------------------------------------------------------------------------------------*

        // Water Weight
        if(($request->water_weight < $specification[0]->water_weight_low) or ($request->water_weight > $specification[0]->water_weight_high)){
            $rangeError .= 'Water Weight, ';
        }

        // Water Temperature
        if(($request->water_temperature < $specification[0]->water_temperature_low) or ($request->water_temperature > $specification[0]->water_temperature_high)){
            $rangeError .= 'Water Temperature, ';
        }

        // Water Temperature ACT
        if(($request->water_temperature_act < $specification[0]->water_temperature_act_low) or ($request->water_temperature_act > $specification[0]->water_temperature_act_high)){
            $rangeError .= 'Water Temperature ACT, ';
        }

        // Better Temperature
        if(($request->batter_temperature < $specification[0]->batter_temperature_low) or ($request->batter_temperature > $specification[0]->batter_temperature_high)){
            $rangeError .= 'Batter Temperature, ';
        }

        // Grease PSI
        if(($request->grease_psi < $specification[0]->grease_psi_low) or ($request->grease_psi > $specification[0]->grease_psi_high)){
            $rangeError .= 'Grease PSI, ';

        }

        // Oven Exit Crumpet Weight
        if(($request->oven_exit_crumpet_weight < $specification[0]->oven_exit_crumpet_weight_low) or ($request->oven_exit_crumpet_weight > $specification[0]->oven_exit_crumpet_weight_high)){
            $rangeError .= 'Oven Exit Crumpet Weight, ';
        }

        // Hotplate SET Temperature
        if(($request->hotplate_set_temperature < $specification[0]->hotplate_set_temperature_low) or ($request->hotplate_set_temperature > $specification[0]->hotplate_set_temperature_high)){
            $rangeError .= 'Hotplate SET Temperature, ';
        }

        // ----------------------------------------------------------------------------------------------------------------------------------*

        if($rangeError){
            $this->validate($request, [
                'comments' => 'required'
            ], [
                'comments.required' => "The following values are out of spec: " . $rangeError . " Please enter a comment."
            ]);
        }

        if ($request->board_brushes == "Yes"){
            $board_brushes = 1;
        } else {
            $board_brushes = 0;
        }

        // Create HPMIXERS record here
        Hpmixer::create([
            'plant' => $request->plant,
            'process_number' => $product_explode[0],
            'product_id' => $product_explode[1],
            'water_weight' => $request->water_weight,
            'water_temperature' => $request->water_temperature,
            'water_temperature_act' => $request->water_temperature_act,
            'batter_temperature' => $request->batter_temperature,
            'grease_psi' => $request->grease_psi,
            'oven_exit_crumpet_weight' => $request->oven_exit_crumpet_weight,
            'hotplate_set_temperature' => $request->hotplate_set_temperature,
            'hotplate_act_temperature' => $request->hotplate_act_temperature,
            'internal_temperature' => $request->internal_temperature,
            'board_brushes' => $board_brushes,
            'comments' => $request->comments,
            'id_number' => $request->user_id
        ]);

        return back();
    }
}
