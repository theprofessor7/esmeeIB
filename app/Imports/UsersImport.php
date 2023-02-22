<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'register'     => $row['register'],
            'usertype' => 'Student',
            'lastname'    => $row['lastname'], 
            'firstname' => $row['firstname'],
            'civility' => $row['civility'],
            'email' => $row['email'],
            'birthday' => $row['birthday'],
            'nationality' => $row['nationality'],
            'section' => $row['section'],
            'writing' => $row['writing'],
            'reading' => $row['reading'],
            'listening' => $row['listening'],
            'speaking' => $row['speaking'],
            'IELTS' => $row['ielts'],
            'average' => $row['average'],
            'rank' => $row['rank'],
            'password' => Hash::make($row['register']),
            'status' => 0,
            'management' => $row['management']
        ]);
    }
}
