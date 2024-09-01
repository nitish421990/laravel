<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    function addUser(Request $request)
    {
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $result = $user->save();
        if ($result) {
            $request->session()->flash('status', "data added successfullly");
            return redirect('/list');
            //return redirect('/details')->with('status', 'Saved Successfully');
        } else {
            return redirect('/add-user')->with('status', 'Not Saved Successfully');
        }
    }

    public function userList()
    {
        $result = user::paginate(5);
        return view('userlist', ["data" => $result]);
    }

    public function  editUser($id)
    {
        $result = user::find($id);
        return view('edit-user', ["data" => $result]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = user::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $result = $user->save();
        if ($result) {
            $request->session()->flash('status', "data updated successfullly");
            return redirect('/list');
        } else {
            return redirect('/update-user')->with('status', 'Not Updated Successfully');
        }
    }

    public function deleteUser(Request $request, $id)
    {
        $result = user::destroy($id);
        if ($result) {
            $request->session()->flash('status', "data deleted successfullly");
            return redirect('/list');
        } else {
            return redirect('/list')->with('status', 'Not deleted Successfully');
        }
    }


    public function searchUser(Request $request)
    {
        $result = User::where('name', 'like', '%' . $request->search . '%')->get();
        if (count($result) > 0) {
            return view('userlist', ["data" => $result, "search" => $request->search]);
        }
    }

    public function multiDeleteUser(Request $request){
        $ids = $request->ids;
       // print_r($ids); die;
       // $ids = implode(",",$ids); 
        $result = User::destroy($ids);  
        if ($result) {
            $request->session()->flash('status', "data deleted successfullly");
            return redirect('/list');
        } else {
            return redirect('/list')->with('status', 'Not deleted Successfully');
        }

    }
}
