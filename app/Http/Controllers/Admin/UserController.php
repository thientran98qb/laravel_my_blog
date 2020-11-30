<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('backend.users.index',compact('users'));
    }
    public function edit($id){
        $user=User::whereId($id)->firstOrFail();
        $roles=Role::all();
        $selectedRoles=$user->roles()->pluck('name')->toArray();
        return view('backend.users.edit',compact('user','roles','selectedRoles'));
    }
    public function update($id,UserEditFormRequest $request){
        $user=User::whereId($id)->firstOrFail();
        $user->name=$request->name;
        $user->email=$request->email;
        $password=$request->password;
        if($password != ""){
            $user->password=Hash::make($password);
        }
        $user->save();
        $user->syncRoles($request->role);
        return redirect()->route('admin-user-index')->with('status','Update successfully User');
    }
}
