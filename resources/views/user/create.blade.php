
@extends('layouts.app')
@section('content')
    <div class="offset-3 col-md-6">
        <h1 class="text-center">Create User</h1>
        <form class="bg-dark" method="post" action="{{url('/')}}/user">
            @if (count($errors->register) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->register->all() as $error)
                            <P>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-warning">{{ Session::get('message') }}</div>
            @endif
            {{csrf_field()}}
            <div class="form-group text-white-50">
                <label for="input-name">Username</label>
                <input class="form-control" type="text" id="input-username" name="username"/>
                <span id="input-username-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
            <div class="form-group text-white-50">
                <label for="input-name">Name</label>
                <input class="form-control" type="text" id="input-name" name="name"/>
                <span id="input-name-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
            <div class="form-group text-white-50">
                <label for="input-email">Email</label>
                <input class="form-control" type="email" id="input-email" name="email"/>
                <span id="input-email-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
            <div class="form-group text-white-50">
                <label for="input-password">Password</label>
                <input class="form-control" type="password" id="input-password" name="password"/>
                <span id="input-password-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
            <div class="form-group text-white-50">
                <label for="input-password-confirmation">Password</label>
                <input class="form-control" type="password" id="input-password-confirmation" name="password_confirmation"/>
                <span id="input-password-confirmation-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
            <div class="form-group">
                <div class="btn-group" role="group">
                    <button class="btn btn-primary mr-10" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection

