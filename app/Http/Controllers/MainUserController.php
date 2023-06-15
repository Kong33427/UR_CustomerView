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
        $optiontype = Session::get('optiontype');
        $implode = implode($optiontype);
        var_dump($implode);
        // var_dump($optiontype);
        // var_dump($optiontype);
        // var_dump($optionrequester);
        // if ($optionrequester == null && $optiontype == null) {
        //     var_dump('1');
        // }
        // if ($optionrequester != null && $optiontype ==null) {

        // }
        // if ($optionrequester == null && $optiontype !=null) {

        // }
        // if ($optionrequester != null && $optiontype !=null) {

        // }

        // $data = DB::table('CLICKUP_DATA as C')
        // ->select('C.TASK_ID', 'C.TASK_NAME', 'C.COMPLETION', 'C.STATUS', 'C.END_DATE', 'C.TEAM', 'C.BU', 'C.TYPE')
        // ->whereIn('C.TYPE', $optiontype)
        // ->whereIn('C.REQUESTER', $optionrequester)
        // ->where('C.CREATE_DATE', function ($query) {
        //     $query
        //         ->select(DB::raw('MAX(CREATE_DATE)'))
        //         ->from('CLICKUP_DATA');
        // })
        // ->get();
        $query = 'SELECT C.TASK_ID';
        $query.=', C.TASK_NAME';
        $query.=', C.COMPLETION'; 
        $query.=', C.STATUS'; 
        $query.=', C.END_DATE'; 
        $query.=', C.TEAM';
        $query.=', C.BU'; 
        $query.=', C.TYPE '; 
        $query.='FROM CLICKUP_DATA C ';
        $query .= 'WHERE ';
        $query .= "C.TYPE IN ('3. UR', '1. Main Project')";
        if ($optiontype != null) {
            $optiontypeString = implode("', '", $optiontype);
            $query .= " AND C.TYPE IN ('$optiontypeString')";
        }
        if ($optionrequester != null) {
            $query .= " AND C.REQUESTER = '$optionrequester'";
        }
        $query .='AND C.CREATE_DATE = (SELECT MAX(CREATE_DATE) FROM CLICKUP_DATA)';
        
        var_dump($query);
        // exit;
        $data = DB::select($query);

        // foreach ($data as $row) {
        //     var_dump($row->type);
        // }
        // $data = $data->toArray();

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
        $optiontype = $request->optiontype;
        Session::put('optionrequester', $optionrequester);
        Session::put('optiontype', $optiontype);

        return redirect('/main_user');
    }
}
