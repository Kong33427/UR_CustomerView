<?php

namespace App\Http\Controllers;
use App\Models\Clickup;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrackingController extends Controller
{
    public function index()
    {
        $optiondate = Session::get('optiondate');
        $optionname = Session::get('optionname');
        if ($optiondate == null && $optionname == null) {
            $data = DB::table('CLICKUP_DATA as C')
                ->select('C.TASK_ID', 'C.TASK_NAME', 'C.COMPLETION', 'C.STATUS', 'C.END_DATE', 'C.TEAM', 'C.BU', 'C.TYPE', 'CREATE_DATE', 'PIC_CIT')
                ->where('C.CREATE_DATE', function ($query) {
                    $query
                        ->select(DB::raw('MAX(CREATE_DATE)'))
                        ->from('CLICKUP_DATA')
                        ->whereRaw('C.TASK_ID = TASK_ID');
                })
                ->get();
        }
        if ($optiondate != null) {
            $data = DB::table('CLICKUP_DATA as C')
                ->select('C.TASK_ID', 'C.TASK_NAME', 'C.COMPLETION', 'C.STATUS', 'C.END_DATE', 'C.TEAM', 'C.BU', 'C.TYPE', 'CREATE_DATE', 'PIC_CIT')
                ->where('C.CREATE_DATE', '=', $optiondate)
                ->where('C.CREATE_DATE', function ($query) {
                    $query
                        ->select(DB::raw('MAX(CREATE_DATE)'))
                        ->from('CLICKUP_DATA')
                        ->whereRaw('C.TASK_ID = TASK_ID');
                })
                ->get();
            // var_dump($data);
        }
        if ($optionname != null) {
            $data = DB::table('CLICKUP_DATA as C')
                ->select('C.TASK_ID', 'C.TASK_NAME', 'C.COMPLETION', 'C.STATUS', 'C.END_DATE', 'C.TEAM', 'C.BU', 'C.TYPE', 'CREATE_DATE', 'PIC_CIT')
                ->where('C.PIC_CIT', '=', $optionname)
                ->where('C.CREATE_DATE', function ($query) {
                    $query
                        ->select(DB::raw('MAX(CREATE_DATE)'))
                        ->from('CLICKUP_DATA')
                        ->whereRaw('C.TASK_ID = TASK_ID');
                })
                ->get();
            // var_dump($data);
        }
        $statusCounts = [
            'COMPLETE' => 0,
            'TO DO' => 0,
            'DELAY' => 0,
            'IN PROGRESS' => 0,
            'CANCEL' => 0,
            'HOLD' => 0,
        ];
        foreach ($data as $item) {
            $status = $item->status;
            if (isset($statusCounts[$status])) {
                $statusCounts[$status]++;
            }
        }

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
        return view('cs_tracking', compact('data', 'statusCounts', 'CreateDates', 'piccits'));
        // return view('cs_tracking')->with('data',$data);
    }
    public function option(Request $request)
    {
        $optiondate = $request->optiondate;
        $optionname = $request->optionname;
        Session::put('optiondate', $optiondate);
        Session::put('optionname', $optionname);
        var_dump($optiondate);
        return redirect('/cs_tracking');
    }
}
