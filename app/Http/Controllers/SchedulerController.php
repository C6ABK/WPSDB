<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\scheduler;
use Illuminate\Http\Request;

class SchedulerController extends Controller{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        // $schedulers = scheduler::get()->where('active', '=', 1);
        $schedulers = scheduler::with(['product'])->get();

        return view('scheduler', [
            'schedulers' => $schedulers
        ]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'sequence_number' => 'required|gt:0',
            'run_number' => 'required|gt:0',
            'process_number' => 'required|unique:schedulers|gt:0',
            'product_id' => 'required|gt:0|exists:products',
            'sales_date' => 'required',
        ], [
            'product_id.exists' => 'Product ID is invalid - must exist on the PRODUCT LIST page.'
        ]);

        scheduler::create([
            'sequence_number' => $request->sequence_number,
            'run_number' => $request->run_number,
            'process_number' => $request->process_number,
            'product_id' => $request->product_id,
            'sales_date' => $request->sales_date,
            'active' => 1
        ]);

        return redirect()->route('scheduler');
    }

    public function destroy(scheduler $item){
        $item->delete();
        return back();
    }
}

