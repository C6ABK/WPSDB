<?php

namespace App\Imports;

use App\Models\scheduler;
use Maatwebsite\Excel\Concerns\ToModel;

class schedulerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){
        return new scheduler([
            'sequence_no' => $row[0],
            'run' => $row[1],
            'process_no' => $row[2],
            'material' => $row[3],
            'sales_date' => $row[4],
        ]);
    }
}
