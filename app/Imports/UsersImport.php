<?php

namespace App\Imports;

use App\Models\Clickup;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
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
            'CREATE_DATE' => $this->additionalValue,
        ]);
    }
    public function rules(): array
    {
        // Define your validation rules here
        return [
            0 => 'required', // Task ID validation
            1 => 'required', // Task Name validation
            2 => 'required', // Task Name validation
            3 => 'required', // Task Name validation
            4 => 'required', // Task Name validation
            5 => 'required', // Task Name validation
            6 => 'required', // Task Name validation
            7 => 'required', // Task Name validation
            8 => 'required', // Task Name validation
            9 => 'required', // Task Name validation
            10 => 'required', // Task Name validation
            11 => 'required', // Task Name validation
            12 => 'required', // Task Name validation
            13 => 'required', // Task Name validation
            14 => 'required', // Task Name validation
            15 => 'required', // Task Name validation
            16 => 'required', // Task Name validation
            17 => 'required', // Task Name validation
            18 => 'required', // Task Name validation
            19 => 'required', // Task Name validation
            20 => 'required', // Task Name validation
            21 => 'required', // Task Name validation
            22 => 'required', // Task Name validation
            23 => 'required', // Task Name validation
            24 => 'required', // Task Name validation
            25 => 'required', // Task Name validation
            26 => 'required', // Task Name validation
            27 => 'required', // Task Name validation
            28 => 'required', // Task Name validation
            29 => 'required', // Task Name validation
            30 => 'required', // Task Name validation
            31 => 'required', // Task Name validation
            32 => 'required', // Task Name validation
            // Rest of the fields' validation rules
        ];
    }
}
