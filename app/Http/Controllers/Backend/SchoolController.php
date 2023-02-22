<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function SchoolView(){
        //$allData = User::all();
        $data['allData'] = School::all();
        return view('backend.school.view_school', $data);
    }

    public function SchoolAdd() {
        return view('backend.school.add_school');
    }

    public function SchoolStore(Request $request) {

        $validatedData = $request->validate([
            'Sigle' => 'required|unique:schools',
            'Pays' => 'required',
            'Universite' => 'required',
        ]);

        $data = new School();
        $data->Sigle = $request->Sigle;
        $data->Pays = $request->Pays;
        $data->Universite = $request->Universite;
        $data->IELTSMin = $request->IELTSMin;
        $data->IELTSMax = $request->IELTSMax;
        $data->Writing = $request->Writing;
        $data->Reading = $request->Reading;
        $data->Listening = $request->Listening;
        $data->Speaking = $request->Speaking;
        $data->Moyenne = $request->Moyenne;
        $data->Places = $request->Places;
        $data->Management = $request->Management;
        $data->Stage = $request->Stage;
        $data->Espagnol = $request->Espagnol;
        $data->NombreEtudiants = 0;
        $data->save();

        $notification = array(
            'message' => 'School Inserted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school.view')->with($notification);

    }

    public function SchoolEdit($id) {
        $editData = School::find($id);
        return view('backend.school.edit_school', compact('editData'));
    }

    public function SchoolUpdate(Request $request, $id) {

        $data = School::find($id);
        $data->Sigle = $request->Sigle;
        $data->Pays = $request->Pays;
        $data->Universite = $request->Universite;
        $data->IELTSMin = $request->IELTSMin;
        $data->IELTSMax = $request->IELTSMax;
        $data->Writing = $request->Writing;
        $data->Reading = $request->Reading;
        $data->Listening = $request->Listening;
        $data->Speaking = $request->Speaking;
        $data->Moyenne = $request->Moyenne;
        $data->Places = $request->Places;
        $data->Management = $request->Management;
        $data->Stage = $request->Stage;
        $data->Espagnol = $request->Espagnol;
        $data->save();

        $notification = array(
            'message' => 'School Inserted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school.view')->with($notification);
    }

    public function SchoolDelete($id) {
        $school = School::find($id);
        $school->delete();

        $notification = array(
            'message' => 'School Deleted Succesfully',
            'alert-type' => 'info'
        );

        return redirect()->route('school.view')->with($notification);
    }
}
