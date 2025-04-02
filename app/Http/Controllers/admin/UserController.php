<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    function loginadmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = User::where('email',$request->email)->firstOrFail();

        if(Auth::attempt($request->only('email','password'))){
            // dd('Auth Attempt');
            return view('layout.dashboard', ['data' => $data]);

        }
        // dd("Invaild Credential");
        return back()->withErrors(['error' => 'Invaild Credentials']);
    }

    function signUp(Request $request){
        $request->validate([
            'name'=>'String|required|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with(['success'=>'Registration Successfull!',
            'name'=> $request->name,
        ]);
    }

    function user(){
        $data['users'] = User::all()->where('role', 2);

        return view('admin.user')->with($data);
    }

    function edit($id){
        $user['data'] = User::where('id',$id)->firstOrFail();

        if(!$user){
            return "Something went Wrong";
        }
        else{
            return view("admin.edit")->with($user);
        }
    }

    function editUser(Request $request){
        $user = User::findOrFail($request->id);


        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:1,2',
        ]);

        
        if(User::where('email', $request->email)->where('id', '!=', $request->id)->exists()){
            return redirect()->route('admin.user')->with('msg','Email Already Exist');
        }

        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('admin.user')->with('msg','User Updated Successfully');

    }



}
