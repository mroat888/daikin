<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('backend.login.index');
    }

    public function login(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->username, 'password' => $request->password])) {
            return redirect(route('backend.dashboard'));
        }else{
            return redirect()->route('backend.index'); // Invaild password
        }
    }

    public function logout()
    {
        session()->flush();
        Auth::guard('admin')->logout();
        return redirect()->route('backend.index');
    }
}
