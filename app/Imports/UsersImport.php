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

    public function __construct($additionalValue)
    {
        $this->additionalValue = $additionalValue;
    }
    public function model(array $row)
    {
        // var_dump($row);
        return new Clickup([
            'TASK_ID' => $row['task_id'],
            'TASK_NAME' => $row['task_name'],
            'REF_NUM' => $row['reference_numbers_short_text'],
            'COMPLETION' => $row['completed_manual_progress'],
            'PROGRESS' => $row['progress_drop_down'],
            'PHASE' => $row['phase_project_drop_down'],
            'STATUS' => $row['status'],
            'BU' => $row['bu_labels'],
            'TEAM' => $row['team_labels'],
            'START_DATE' => $row['start_date'],
            'END_DATE' => $row['due_date'],
            'BASE_DATE' => $row['baseline_date_date'],
            'PROJECT_DOC' => $row['project_documents_labels'],
            'ASIGNEE' => $row['assignee'],
            'PM_BA_LEADER' => $row['pmbaleader_labels'],
            'PIC_CIT' => $row['pic_cit_labels'],
            'REQUESTER' => $row['requester_short_text'],
            'SPONSOR' => $row['sponsor_short_text'],
            'VENDOR_OTHER' => $row['vendorother_short_text'],
            'BUS_FUNCTION' => $row['business_function_labels'],
            'IMPACT_FALCON' => $row['impact_falcon_drop_down'],
            'IT_OT' => $row['itot_labels'],
            'EST_BUDGET' => $row['est_budget_currency'],
            'LOG_PAY_REQ' => $row['log_request_for_payment_currency'],
            'RESOURCES' => $row['resouces_drop_down'],
            'TYPE' => $row['type_labels'],
            'PRIORITY' => $row['priority'],
            'REGISTER_YEAR' => $row['register_year_short_text'],
            'REQ_DATE' => $row['request_date_date'],
            'LAST_STATUS' => $row['last_status_text'],
            'CURRENT_STATUS' => $row['current_status_text'],
            'NEXT_STATUS' => $row['next_status_text'],
            'MAN_DAY' => $row['manday_number'],
            'CREATE_DATE'=> $this->additionalValue,
        ]);
    }
    public function headingRow(): int
    {
        return 3;
    }
}
