<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            var_dump(Auth::user()->username);
            $optiontype = ['3. UR', '1. Main Project'];
            Session::put('optiontype', $optiontype);
            return redirect()->intended('/main_user');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }
}
