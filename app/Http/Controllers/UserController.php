<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request){

        $userId = Auth::id();
        $data = User::find($userId);
        dd($data->getMedia('images'));
        return view('user.show' , ['user' => $data]);
    }
    public function edit($id){

        $user= User::find($id);
         
        return view('user.edit' , ['user' => $user]);
    }
    public function update( UpdateUserController $request , $id){

        $user= User::find($id);
        $data = $request->all();
        
        if($request->hasFile('image')){

            $user->addMedia($request->image)->toMediaCollection('images' , 'media');

        }
            
        if($request->password != '********'){
            
            $user->password = $data["password"];
        };

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
         
        return redirect()->route('users.show' ,['user' => $user]);
    }
}
