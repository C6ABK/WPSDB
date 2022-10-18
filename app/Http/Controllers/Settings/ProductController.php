<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $products = Product::get()->where('active', '=', 1);

        return view('settings.product', [
            'products' => $products
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'product_id' => 'required|unique:products|gt:0',
            'product_title' => 'required|max:255',
            'plant' => 'required|max:3',
            'type' => 'required|max:255',
        ]);

        Product::create([
            'product_id' => $request->product_id,
            'product_title' => $request->product_title,
            'plant' => $request->plant,
            'type' => $request->type,
            'active' => 1
        ]);

        return redirect()->route('settings.product');
    }


}
