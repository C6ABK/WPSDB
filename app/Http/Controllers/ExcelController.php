<?php

namespace App\Http\Controllers;

use App\Imports\schedulerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller {
    public function store(Request $request){

        //DO A RETURN BACK FOR EACH FILE FOUND/NOT FOUND

        if($request->hasFile('import_file')){
            //File found
            $path = $request->file('import_file')->getRealPath();

            Excel::import(new schedulerImport, request()->file('import_file'));

            //maatwebsite docs
            return back()->with('status', 'Successful Upload');
        }

        //File not found
        return back()->with('status', 'Failed Upload');
    }
}
