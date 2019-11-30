
@extends('layouts.app')
@section('content')
    <h1 class="text-center">Category</h1>
    <div class="d-flex justify-content-end">
        @can('create-user')
        <div class="h-100">
           <a href="{{route('categories.create')}}" title="Add Category">
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
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($categories)&&!is_null($categories))
                @foreach($categories as $categorie)
            <tr>
                <td>{{__($categorie->id)}}</td>
                <td>{{__($categorie->name)}}</td>
                <td>
                    @can('delete-user')
                        <form id="delete-form-{{$categorie->id}}" method="post" action="{{route('categories.destroy',$categorie)}}">
                            @method('delete')
                            {{csrf_field()}}
                            <a href="{{route('categories.edit',$categorie)}}"><span  class="navbar-text"><i class="fa fa-edit"></i></span></a>
                            <span  onclick="document.getElementById('delete-form-{{$categorie->id}}').submit()" class="navbar-text"><i class="fa fa-trash"></i></span>
                        </form>
                    @endcan
                </td>

            </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    {{$categories->links()}}
@endsection

