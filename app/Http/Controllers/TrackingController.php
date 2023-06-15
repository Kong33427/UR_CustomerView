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
        $optionrequester = Session::get('optionrequester');
        $optionrequester = Session::get('optionrequester');
        $optiontype = Session::get('optiontype');
        $implode= implode($optiontype);
        $query = "SELECT C.TASK_ID, C.TASK_NAME, C.COMPLETION, C.STATUS, C.END_DATE, C.TEAM, C.BU, C.TYPE, PIC_CIT FROM CLICKUP_DATA C ".
        "WHERE ".
        "C.TYPE IN ('3. UR', '1. Main Project')";
        if (isset($optiontype)) {
            $optiontypeString = implode("', '", $optiontype);
            $query .= " AND C.TYPE IN ('$optiontypeString')";
        }
        if (isset($optionrequester)) {
            $query .= " AND C.REQUESTER = '$optionrequester'";
        } 
        "AND C.CREATE_DATE = (SELECT MAX(CREATE_DATE) FROM CLICKUP_DATA)" ;
        var_dump($query);
        // exit;
        $data = DB::select($query);
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

        $Createrequester = DB::table('CLICKUP_DATA')
        ->select('REQUESTER')
        ->distinct()
        ->whereNotNull('REQUESTER')
        ->get();
        $Createrequester = $Createrequester->toArray();

        return view('cs_tracking', compact('data', 'statusCounts', 'Createrequester'));
        // return view('cs_tracking')->with('data',$data);
    }
    public function option(Request $request)
    {
        $optionrequester = $request->optionrequester;
        $optiontype = $request->optiontype;
        Session::put('optionrequester', $optionrequester);
        Session::put('optiontype', $optiontype);
        return redirect('/cs_tracking');
    }
}
