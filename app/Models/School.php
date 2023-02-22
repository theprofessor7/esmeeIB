<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'Sigle',
        'Pays',
        'Universite',
        'IELTSMin',
        'IELTSMax',
        'Writing',
        'Reading',
        'Listening',
        'Speaking',
        'Moyenne',
        'Places',
        'Management',
        'Stage',
        'Espagnol',
        'NombreEtudiants',
        'Flag'
    ];
}
