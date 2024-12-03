<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersControllerAdmin extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }
    public function updateuser(Request $request,$id)
    {
        $request->validate(
            [
                'password' => 'nullable|confirmed|min:8',
            ]
        );
        $User = User::find($id);
        $User->password = bcrypt(request('password'));
        $User->usertype_id = request('usertype_id');
        $User->save();
        return redirect()->route('admin.users')->with('success','Update User Successfully!');
    }
    public function addbalance(Request $request)
    {
        $request->validate(
            [
                'balance' => 'required|numeric',
            ]
        );
        $user = User::findOrFail($request->id);
        $user->balance += $request->balance;
        $user->save();
        return redirect()->route('admin.users')->with('success', 'Added balance to user successfully!');
    }
    
}
