<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->session()->has('key_login')) {
            $value = $request->session()->get('key_login');
            return view('dashboard')->with([
                'model' => $value
            ]);
        } else {
            return redirect()->route('login.index', 'admin');
        }
        
    }
}
