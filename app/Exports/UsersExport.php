<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

/*class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    /*public function collection()
    {
        return User::all();
    }
} */

class UsersExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        //return User::all('register', 'lastname', 'firstname', 'civility', 'email', 'birthday', 'nationality', 'section', 'writing', 'reading', 'listening', 'speaking', 'IELTS', 'average', 'rank');

        return User::select('register', 'lastname', 'firstname', 'civility', 'email', 'birthday', 'nationality', 'section', 'writing', 'reading', 'listening', 'speaking', 'IELTS', 'average', 'rank', 'management')->where('usertype', 'Student');
    }

    public function query()
    {
        return User::query()->where('usertype', 'Student');
    }

    public function headings(): array
    {
        return [
            'register',
            'lastname',
            'firstname',
            'civility',
            'email',
            'birthday',
            'nationality',
            'section',
            'writing',
            'reading',
            'listening',
            'speaking',
            'IELTS',
            'average',
            'rank'
        ];
    }
} 

