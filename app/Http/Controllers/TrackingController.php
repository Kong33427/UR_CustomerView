<?php

namespace App\Http\Controllers;
use App\Models\Clickup;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $data = DB::table('CLICKUP_DATA as C')
        ->select('C.TASK_ID', 'C.TASK_NAME', 'C.COMPLETION', 'C.STATUS', 'C.END_DATE', 'C.TEAM', 'C.BU', 'C.TYPE')
        ->where('C.CREATE_DATE', function ($query) {
            $query->select(DB::raw('MAX(CREATE_DATE)'))
                ->from('CLICKUP_DATA')
                ->whereRaw('C.TASK_ID = TASK_ID');
        })
        ->get();
        //-----get all data----
        // $data = DB::table('CLICKUP_DATA')
        // ->select('TASK_ID', 'TASK_NAME','COMPLETION','STATUS','END_DATE','TEAM','BU','TYPE')
        // ->get();
        // var_dump($data);
        $data = $data->toArray();
        // dd($data);
        $CreateDates = DB::table('CLICKUP_DATA')
        ->select('CREATE_DATE')
        ->distinct()
        ->get();
        $CreateDates = $CreateDates->toArray();

        $piccits = DB::table('CLICKUP_DATA')
        ->select('PIC_CIT')
        ->distinct()
        ->get();
        $piccits = $piccits->toArray();
        // var_dump($piccits);
        return view('cs_tracking', compact('data','CreateDates','piccits'));
        // return view('cs_tracking')->with('data',$data);
    }
}
