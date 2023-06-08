<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MainUserController extends Controller
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
        // var_dump($data);
        $data = $data->toArray();

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
    
        $CreateDates = DB::table('CLICKUP_DATA')
        ->select('CREATE_DATE')
        ->distinct()
        ->get();
        $CreateDates = $CreateDates->toArray();
        // var_dump($statusCounts);
        // var_dump($CreateDates);

        return view('main_user', compact('statusCounts'),compact('CreateDates'));
    }
    public function option(Request $request)
    {
        $option= $request->option;
        var_dump($option);

    }
}
