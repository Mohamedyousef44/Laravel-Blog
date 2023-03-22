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
        return view('user.show' , ['user' => $data]);
    }
    public function edit($id){

        $user= User::find($id);
         
        return view('user.edit' , ['user' => $user]);
    }
    public function update( UpdateUserController $request , $id){

        $user= User::find($id);
        dd($request->all());
         
        return redirect()->route('user.edit' ,['user' => $user]);
    }
}
