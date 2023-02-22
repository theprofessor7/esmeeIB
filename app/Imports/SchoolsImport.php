<?php

namespace App\Imports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class SchoolsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new School([
            'Sigle' => $row['sigle'],
            'Pays' => $row['pays'],
            'Universite' => $row['universite'],
            'IELTSMax' => $row['ieltsmax'],
            'IELTSMin' => (!empty($row['ieltsmin']) ? $row['ieltsmin'] : 0.0),
            'Writing' => (!empty($row['writing']) ? $row['writing'] : 0.0),
            'Reading' => (!empty($row['reading']) ? $row['reading'] : 0.0),
            'Listening' => (!empty($row['listening']) ? $row['listening'] : 0.0),
            'Speaking' => (!empty($row['speaking']) ? $row['speaking'] : 0.0),
            'Moyenne' => $row['moyenne'],
            'Places' => (int)$row['places'],
            'Management' => $row['management'],
            'Stage' => $row['stage'],
            'Espagnol' => $row['espagnol'],
            'Flag' => $row['flag']
        ]);
    }
}
