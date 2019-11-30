
@extends('layouts.app')
@section('content')
    <div class="offset-3 col-md-6">
        <h1 class="text-center">Edit Categories</h1>
        <form class="bg-dark" method="post" action="{{isset($categories)?route('categories.update',$categories):route('categories.store')}}">
           @method('put')
            @if (count($errors->categories) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->categories->all() as $error)
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
                <label for="input-name">Name</label>
                <input class="form-control" type="text" id="input-name" name="name" value="{{isset($categories)?$categories->name:''}}"/>
                <span id="input-name-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
            <div class="form-group">
                <div class="btn-group" role="group">
                    <button class="btn btn-primary mr-10" type="submit">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

