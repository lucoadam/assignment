
@extends('layouts.app')
@section('content')
    <h1 class="text-center">Users</h1>
    <div class="d-flex justify-content-end">
        @can('create-user')
        <div class="h-100">
           <a href="/user/create" title="Create User">
               <span class="navbar-text"><i class="fa fa-plus-circle"></i></span>
           </a>
        </div>
        @endcan
    </div>
    @if(isset($success)&&!is_null($success))
            <div class="alert alert-success">
                {{$success}}
            </div>
    @endif
    <div class="table-responsive">
        <table class="table text-white">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($users)&&!is_null($users))
                @foreach($users as $user)
            <tr>
                <td>{{__($user->id)}}</td>
                <td>{{__($user->name)}}</td>
                <td>{{__($user->email)}}</td>
                <td>{{__(ucfirst($user->role))}}</td>
                <td>
                    @if(auth()->user()->id!=$user->id)
                    @can('delete-user')
                        <form id="delete-form-{{$user->id}}" method="post" action="{{route('user.destroy',$user)}}">
                            @method('delete')
                            {{csrf_field()}}
                            <span  onclick="document.getElementById('delete-form-{{$user->id}}').submit()" class="navbar-text"><i class="fa fa-trash"></i></span>
                        </form>
                    @endcan
                    @endif
                </td>

            </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    {{$users->links()}}
@endsection

