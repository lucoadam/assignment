<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\CreateUserRequest;
use App\Http\Requests\user\DeleteUserRequest;
use App\Http\Requests\user\EditUserRequest;
use App\Http\Requests\user\IndexUserRequest;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Http\Requests\user\ViewUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexUserRequest $request,User $user)
    {
        //
        return view('user.index')->with(['users'=>$user->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateUserRequest $request)
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        $input = $request->all();
        if(isset($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        if(User::create($input)){
            return redirect(route('user.index'))->with([
                'success'=>'User created Successfully'
            ]);
        }
        return redirect(route('user.index'))->with([
            'success'=>'User creation failed'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ViewUserRequest $request,User $user)
    {
        //
        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditUserRequest $request,User $user)
    {
        //
        dd($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        dd($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteUserRequest $request,User $user)
    {
        //
        if($user->delete()){
            return redirect()->back()->with('success','Deleted Successfully');
        }
        return redirect()->back()->with('success','Task Unsuccessful');
    }
}
