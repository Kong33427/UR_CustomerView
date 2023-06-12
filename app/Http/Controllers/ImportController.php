<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Days;
use Carbon\Carbon;

class ImportController extends Controller
{
    public function show()
    {
        return view('/cs_upload');
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        echo $file;
        if ($file == NULL ){
            $message= 'ไม่มีไฟล์';
            return back()->with('message',$message);
        }
        $count=2;
        $time = date('Y-m-d H:i:s');
        $data = Excel::toArray([], $file);
        foreach ($data as $row) {
            foreach ($row as $col) {
                $count++;
                $cols=implode($col);
                // var_dump($cols);

                if (strpos($cols,'Task') !== false) {
                    var_dump($count);
                    break;
                }
            }
        }
        $time= date('Y-m-d H:i:s');
        echo $time;
        // Excel::import(new UsersImport($time), $file);
        Excel::import(new UsersImport($time, $count), $file);
        $message= 'ไม่มีไฟล์';
        return back()->withStatus('File Imported');
        }
    }
