<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\UserChoice;
use Auth;
use Illuminate\Support\Facades\DB;

class UserChoiceController extends Controller
{
    public function index() {
        $data['schools'] = School::all();
        $forbidden_schools = $this->getForbiddenSchools();

        foreach ( $data['schools'] as $index => $tab ) {
            if ( in_array($tab['Sigle'], $forbidden_schools) ) {
                unset($data['schools'] [$index]);
            }
        }

        return view('choose', $data);

    }

    public function edit() {

        $my_order = DB::table('userchoices')->where('user_id', Auth::id())->get();

        $data['schools'] = $this->getSchoolsFromChoiceOrder($my_order[0]->order);

        return view('chooseUpdate', $data);

    }

    public function store(Request $request) {
        $userchoice = new UserChoice();
        $user = Auth::user();

        $userchoice->user_id = $user->id;
        $userchoice->order = $request->data;

        $choices_tab = explode(",", $userchoice->order);
        
        $userchoice->school = $choices_tab[0];

        //$this->incrementStudents($userchoice->school);
        $this->updateStatus($user->id);

        $userchoice->save();
        return view('confirmation');
    }

    public function update(Request $request) {
        $userchoice = UserChoice::where('user_id', '=', Auth::id())->first();
        $user = Auth::user();

        $userchoice->order = $request->data;

        $choices_tab = explode(",", $userchoice->order);

        if($choices_tab[0] != $userchoice->school){    // L'utilisateur change son premier choix -> retour à la sélection
            $userchoice->last_school = $userchoice->school;
        }

        $userchoice->school = $choices_tab[0];

        /*if($userchoice->last_school != $userchoice->school) {    // Changement d'école on met à jour les places
            $this->decrementStudents($userchoice->last_school);
            $this->incrementStudents($userchoice->school);
        }*/

        $this->updateStatus($user->id);

        $userchoice->save();
        return view('confirmation');
    }

    public function getForbiddenSchools() {
        $schools = School::all();
        $user = Auth::user();
        $forbid = array();

        array_push($forbid, 'BU');

        if($user->writing < 6 || $user->reading < 6 || $user->listening < 6 || $user->speaking < 6) {
            array_push($forbid, 'BU');
        }

        if($user->writing < 5.5 || $user->reading < 5.5 || $user->listening < 5.5 || $user->speaking < 5.5) {
            array_push($forbid, 'BANG', 'CARD', 'CSULB', 'CSULBM', 'HW', 'UC');
        }

        if($user->writing < 5 || $user->reading < 5 || $user->listening < 5 || $user->speaking < 5) {
            array_push($forbid, 'HWD');
        }

        if ($user->moyenne < 14) {
            array_push($forbid, 'FREI');
        }

        if ($user->moyenne < 13) {
            array_push($forbid, 'SEOULT');
        }

        if ($user->moyenne < 12) {
            array_push($forbid, 'BME', 'BU', 'CHIKTA', 'CVUT', 'ESS', 'HWD', 'LISB', 'NYCU', 'SFSU', 'SPL', 'SUN', 'UCSB', 'UCSD', 'UCSDB', 'UCSDM', 'UOM', 'UPM');
        }

        if ($user->moyenne < 11.5) {
            array_push($forbid, 'ELISA', 'HIT', 'UOW');
        }


        if ($user->moyenne < 11) {
            array_push($forbid, 'BANG', 'CAGLI', 'CSULB', 'CSULBM', 'CSUMB', 'FONTYS', 'HGU', 'HUST', 'JAMK', 'LPU', 'METU', 'PORT', 'SFSUB', 'TSI', 'UC', 'YZU');
        }


        if ($user->ielts < 7) {
            array_push($forbid, 'BU', 'SUN', 'UCSB', 'UCSD', 'UCSDB', 'UCSDM');
        }

        if ($user->ielts < 6.5) {
            array_push($forbid, 'BANG', 'CARD', 'FREI', 'MU', 'SFSU', 'UOW');
        }

        if ($user->ielts < 6.5) {
            array_push($forbid, 'AUC', 'CSULB','CSUMB', 'ELISA', 'FONTYS', 'HGU', 'HIT', 'HW', 'HWD', 'JAMK', 'LPU', 'NYCU', 'SFSUB', 'SPL', 'UC', 'UNISA', 'UNIZG');
        }

        if ($user->ielts < 5.5) {
            array_push($forbid, 'BME', 'BMEM', 'CAGLI', 'CHAND', 'CHIKTA', 'CVUT', 'EMD', 'ESS', 'GCC', 'GCCM', 'GCD', 'GCDM', 'GCL', 'GCLM', 'HUST', 'ISEC', 'ITS', 'ITSM', 'ITSN', 'KMUTT', 'KNU', 'KTU', 'KUTH', 'KUTHM', 'KUTHM', 'LISB', 'METU', 'PNU', 'PNUM', 'PORT', 'PCUM', 'PCU', 'SEOULT', 'SHIBAU', 'SIIT', 'SU', 'SWT', 'SWTM', 'TEC','TSI', 'UDESC','UNIC', 'UNICM', 'UOM', 'UPM', 'UPV', 'YZU');
        }

        if ($user->ielts < 5) {
            array_push($forbid, 'RTU_PA', 'RTUM', 'SCHMA', 'SPL_ENI', 'VGTU', 'VSBM');
        }

        if ($user->ielts < 4.5) {
            array_push($forbid, 'VSB');
        }

        if ($user->ielts < 4) {
            array_push($forbid, 'CUT', 'SPL_ENB');
        }

        if ($user->management != "oui" && $user->management != "OUI"){
            array_push($forbid, 'BMEM', 'CSULBM', 'GCCM', 'GCDM', 'GCLM', 'ITSM', 'KUTHM', 'PNUM', 'PCUM', 'RTUM', 'SIITM', 'SWTM', 'UCSDM', 'UNICM', 'VSBM');
        }

        if ($user->register == '20B67') {
            $forbid = array_diff($forbid, array('BU'));
        }

        array_unique($forbid);
        return $forbid;
    }

    public function getColumnFromSchools($column) {
        $tab = School::all([$column])->toArray();
        $values = array();

        for($i=0; $i < count($tab); $i++){
            array_push($values, $tab[$i][$column]);
        }

        return $values;
    }

    public function getSchoolFromColumn($column, $val) {
        return DB::table('schools')->where($column, $val)->get()->toArray();
    }

    public function isFull($schoolSigle) {
        $schoolObject = $this->getSchoolFromColumn('Sigle', $schoolSigle);
        return $schoolObject[0]->NombreEtudiants == $schoolObject[0]->Places;
    }

    public function updateStatus($user_id) {
        $data = User::find($user_id);
        $data->status = 1;
        $data->save();
    }

    public function incrementStudents($school_slug) {
        $data = School::where('Sigle', '=', $school_slug)->first();
        $data->increment('NombreEtudiants');
    }

    public function decrementStudents($school_slug) {
        $data = School::where('Sigle', '=', $school_slug)->first();
        if ($data->NombreEtudiants > 0){
            $data->decrement('NombreEtudiants');
        }
    }

    public function getSchoolsFromChoiceOrder($order) {
        $choices = explode(',', $order);
        $res = array();

        for($i=0; $i < count($choices); $i++){
            $res[] = $this->getSchoolFromColumn('Sigle', $choices[$i])[0];    // Pour les colonnes uniques
        }

        return $res;
    }


}