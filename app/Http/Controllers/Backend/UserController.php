<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function UserView(){
        //$allData = User::all();
        $data['allData'] = User::where('usertype', '!=',  "Administrator")->get();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd() {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request) {

        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'register' => 'required'

        ]);

        $data = new User();
        $data->usertype = "Student";
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->civility = $request->civility;
        $data->section = $request->section;
        $data->register = $request->register;
        $data->nationality = $request->nationality;
        $data->status = 0;
        $data->rank = $request->rank;

        $data->save();

        $notification = array(
            'message' => 'User Inserted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);

    }

    public function UserEdit($id) {
        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function UserUpdate(Request $request, $id) {

        $data = User::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->civility = $request->civility;
        $data->section = $request->section;
        $data->register = $request->register;
        $data->nationality = $request->nationality;
        $data->rank = $request->rank;

        $data->save();

        $notification = array(
            'message' => 'User Updated Succesfully',
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id) {
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Succesfully',
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }



}

