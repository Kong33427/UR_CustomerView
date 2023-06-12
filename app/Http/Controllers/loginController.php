<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->intended('/main_user');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
        // Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        // $user = Auth::user();
        // if ($user) {
        //     // User is authenticated
        //     echo "Welcome, " . $user->username;
        //     return redirect()->intended('/a');
        // } else {
        //     // User is not authenticated
        //     echo "Please log in";
        // }
    }
}
