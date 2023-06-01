<?php
use App\Models\User;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{

    public function login(Request $request){
        echo '123';
        // print_r($request->input('username'));
        // print_r($request->input('password'));
        $username=$request->input('username');
        $password=$request->input('password');
        $users = DB::table('WEBAPP2_USERS')
            ->select('username', 'password','is_admin')
            ->where('username', '=', $username)
            ->where('password', '=', $password)
            ->first();
            $array = (array) $users;
            var_dump($users);
            if(!$users){
                $message="wrong username or password";
                return redirect('/login')->with('message',$message);
            }
            else{
                // if($array['is_admin'] == 1){
                //     return redirect('/main_admin');
                //     echo 'admin';

                // }else{
                //     echo 'user1';
                // }
                return redirect('/main_user');
        }
        // $array = (array) $users;
        // $count = $users->count();
        // // echo json_encode($users);
        // // $data = array();
        // // $data['username'] = request('username');
        // // $data['password'] = request('password');
        // // return redirect('/');
        // // $users= json_decode($users);
        // print_r($array);
        // if ($count != 0 ) {
        //     // redirect('/');
        //     echo 'success';
        // }else{
        //     echo 'fail';
        //     // redirect('/login');
        // }

    }
}
