<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Schools;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SchoolsExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return School::all();
    }

    /*public function query()
    {
        return School::query();
    }*/

    public function headings(): array
    {
        return [
            'Sigle',
            'Pays',
            'Universite',
            'IELTSMax',
            'IELTSMin',
            'Writing',
            'Reading',
            'Listening',
            'Speaking',
            'Moyenne',
            'Places',
            'Management',
            'Stage',
            'Espagnol',
            'Flag'
        ];
    }
}
