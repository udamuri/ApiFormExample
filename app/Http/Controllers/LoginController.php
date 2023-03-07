<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    public function index(Request $request, $slug)
    {
        if ($request->session()->has('key_login')) {
            return redirect()->route('dashboard');
        } else {
            return view('login')->with(['slug' => $slug]);
        }
        
    }

    public function login(Request $request, $slug) {
        $response = Http::post("127.0.0.1:8000/api/v1/auth/login/{$slug}", [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'device_name' => 'web-app',
        ]);
        
        if($response->successful()) {
            $data = json_decode($response->body(), true);
            if(isset($data['success']) && $data['success']) {
                $request->session()->put('key_login', $data['data']);
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('error-login', $data['message']);   
            }
        } else {
            $request->session()->forget('key_login');
            $request->session()->flush();
            return redirect()->route('homes');
        }
    }

    public function exit(Request $request) {
        $request->session()->forget('key_login');
        $request->session()->flush();
        return redirect()->route('homes');
    }
}
