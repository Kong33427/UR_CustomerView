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
        if ($optionrequester == null) {
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
        if ($optionrequester != null) {
            $data = DB::table('CLICKUP_DATA as C')
                ->select('C.TASK_ID', 'C.TASK_NAME', 'C.COMPLETION', 'C.STATUS', 'C.END_DATE', 'C.TEAM', 'C.BU', 'C.TYPE', 'CREATE_DATE', 'PIC_CIT')
                ->where('C.requester', '=', $optionrequester)
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
        Session::put('optionrequester', $optionrequester);
        return redirect('/cs_tracking');
    }
}
