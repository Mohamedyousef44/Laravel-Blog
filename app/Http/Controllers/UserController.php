<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){

        // dd($request->cookie());
        $userId = Auth::id();
        $data = User::find($userId);
        $media = $data->getMedia('images');
        // $idx = $idx == 0 ? count($media)-1 : $idx;
        return view('user.index' , ['user' => $data , 'photos' => $media]);
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
         
        return redirect()->route('users.index' );
    }

    public function show($id){

        $user= User::find($id);

        $photos = $user->getMedia('images');
         
        return view('user.show' , ['photos' => $photos]);
    }
}
