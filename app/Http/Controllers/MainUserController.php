<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class MainUserController extends Controller
{
    public function index()
    {
        // $optiondate = Session::get('optiondate');
        // $optionname = Session::get('optionname');
        $optionrequester = Session::get('optionrequester');
        var_dump($optionrequester);
        // var_dump($optionname);
        $piccits = [];
        if ($optionrequester == null || $optionrequester == 'no user') {
            Session::forget('optionrequester');
            $data = DB::table('CLICKUP_DATA as C')
                ->select('C.TASK_ID', 'C.TASK_NAME', 'C.COMPLETION', 'C.STATUS', 'C.END_DATE', 'C.TEAM', 'C.BU', 'C.TYPE')
                ->where(function ($query) {
                    $query->whereIn('C.TYPE', ['3. UR', '1. Main Project']);
                })
                ->where('C.CREATE_DATE', function ($query) {
                    $query
                        ->select(DB::raw('MAX(CREATE_DATE)'))
                        ->from('CLICKUP_DATA');
                        // ->whereRaw('C.TASK_ID = TASK_ID');
                })
                ->get();
                foreach ($data as $row) {
                    var_dump($row->type);
                }
            $data = $data->toArray();
        }
        if ($optionrequester != null && $optionrequester != 'no user') {
            $data = DB::table('CLICKUP_DATA as C')
                ->select('C.TASK_ID', 'C.TASK_NAME', 'C.COMPLETION', 'C.STATUS', 'C.END_DATE', 'C.TEAM', 'C.BU', 'C.TYPE')
                ->where('C.requester', '=', $optionrequester)
                ->where('C.CREATE_DATE', function ($query) {
                    $query
                        ->select(DB::raw('MAX(CREATE_DATE)'))
                        ->from('CLICKUP_DATA')
                        ->whereRaw('C.TASK_ID = TASK_ID');
                })
                ->get();
            // var_dump($data);
            $data = $data->toArray();
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
        return view('main_user', compact('statusCounts', 'Createrequester'));
    }

    public function option(Request $request)
    {

        $optionrequester = $request->optionrequester;
        Session::put('optionrequester', $optionrequester);

        return redirect('/main_user');
    }
}
