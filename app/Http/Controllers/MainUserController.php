<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MainUserController extends Controller
{
    public function index()
    {
        $data = DB::table('CLICKUP_DATA')
        ->select('TASK_ID', 'TASK_NAME','COMPLETION','STATUS','END_DATE','TEAM','BU','TYPE')->get();
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
    
        // var_dump($statusCounts);

        return view('main_user', compact('statusCounts'));

    }
}
