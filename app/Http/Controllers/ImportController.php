<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        Excel::import(new UsersImport, $file);

        return back()->withStatus('File Imported');
    }
}
