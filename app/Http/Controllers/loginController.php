<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request)
    {
        {
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            return redirect('/main_user');
            
        }
    }
}

