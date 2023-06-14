<?php

namespace App\Imports;

use App\Models\Clickup;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $additionalValue;
    protected $count;

    public function __construct($additionalValue, $count)
    {
        $this->additionalValue = $additionalValue;
        $this->count = $count;
    }
    
    public function model(array $row)
    {
        // var_dump($row);
        return new Clickup([
            'TASK_ID' => $row[0],
            'TASK_NAME' => $row[1],
            'REF_NUM' => $row[2],
            'COMPLETION' => $row[3],
            'PROGRESS' => $row[4],
            'PHASE' => $row['5'],
            'STATUS' => $row['6'],
            'BU' => $row[7],
            'TEAM' => $row[8],
            'START_DATE' => $row[9],
            'END_DATE' => $row[10],
            'BASE_DATE' => $row[11],
            'PROJECT_DOC' => $row[12],
            'ASIGNEE' => $row[13],
            'PM_BA_LEADER' => $row[14],
            'PIC_CIT' => $row[15],
            'REQUESTER' => $row[16],
            'SPONSOR' => $row[17],
            'VENDOR_OTHER' => $row[18],
            'BUS_FUNCTION' => $row[19],
            'IMPACT_FALCON' => $row[20],
            'IT_OT' => $row[21],
            'EST_BUDGET' => $row[22],
            'LOG_PAY_REQ' => $row[23],
            'RESOURCES' => $row[24],
            'TYPE' => $row[25],
            'PRIORITY' => $row[26],
            'REGISTER_YEAR' => $row[27],
            'REQ_DATE' => $row[28],
            'LAST_STATUS' => $row[29],
            'CURRENT_STATUS' => $row[30],
            'NEXT_STATUS' => $row[31],
            'MAN_DAY' => $row[32],
            'REQUEST_EMP_CODE' => $row[33],
            'KEY_ACTIVITY' => $row[34],
            'CREATE_DATE' => $this->additionalValue,
        ]);
    }
    public function startRow(): int
    {
        return $this->count;
    }
}
