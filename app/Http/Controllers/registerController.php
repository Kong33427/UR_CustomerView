<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{
    function register(Request $request)
    {
        echo '123';
        // print_r(var_dump($_POST));
        // print_r($request->input('username'));
        $emp_code=$request->input('emp_code');
        $password=$request->input('password');
        $cpassword=$request->input('cpassword');
        if ($password != $cpassword){
            $message="password not identical";
                return redirect('/register')->with('message',$message);
            }else{
                $users = DB::table('WEBAPP2_USERS')
                ->select('emp_code', 'password','is_admin')
                ->where('emp_code', '=', $emp_code)
                ->where('password', '=', $password)
                ->first();
                $array = (array) $users;
                // var_dump($users);
            if(!$users){
                $user=array(
                    'emp_code' => $emp_code,
                    'username' => $emp_code,
                    'password' => $password
                );
                DB::table('WEBAPP2_USERS') -> insert($user);
                // $user= new User;
                // $user['username']= $request->input('username');
                // $user['password']= $request->input('password');
                // // print_r($user);
                // echo $user->save();
                $message="register success";
                return redirect('/login')->with('message',$message);
            }
            else{
                $message="username already taken";
                return redirect('/register')->with('message',$message);
            }
        }
    }
}
