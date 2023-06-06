<?php

namespace App\Http\Controllers;
use App\Models\Clickup;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $data = DB::table('CLICKUP_DATA')
        ->select('TASK_ID', 'TASK_NAME','COMPLETION','STATUS','END_DATE','TEAM','BU','TYPE')
        ->get();
        // var_dump($data);
        $data = $data->toArray();
        // dd($data);
        return view('cs_tracking', compact('data'));
        // return view('cs_tracking')->with('data',$data);
    }
}
