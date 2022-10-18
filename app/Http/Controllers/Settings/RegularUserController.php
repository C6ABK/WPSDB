<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Regularuser;
use Illuminate\Http\Request;

class RegularUserController extends Controller {
    public function index(){
        $users = Regularuser::get();

        return view('settings.adduser', [
            'users' => $users
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'id_number' => 'required|unique:regularusers'
        ]);

        Regularuser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'id_number' => $request->id_number
        ]);

        return redirect()->route('settings.adduser');
    }
}
