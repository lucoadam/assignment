<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\EditProfileRequest;
use App\Http\Requests\user\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function edit(EditProfileRequest $request){

        return view('profile.edit');
    }

    public function update(UpdateProfileRequest $request,User $user,$id){
        $input = $request->all();
        if(isset($input['password'])){
            $input['password']=Hash::make($input['password']);

        }
        $user=$user->find($id);

        if($user->update($input)){
            return redirect()->back()->withInput(['success'=>'Updated successfully']);
        }else{
            return redirect()->back();
        }
    }
}
