
@extends('layouts.app')
@section('content')
    <h1 class="text-center">Goods</h1>
    <div class="d-flex justify-content-end">
        @can('create-user')
        <div class="h-100">
           <a href="{{route('goods.create')}}" title="Add Goods">
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
                <th>Rate</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(isset(auth()->user()->goods)&&auth()->user()->goods()->exists())
                @foreach($goods as $good)
            <tr>
                <td>{{__($good->id)}}</td>
                <td>{{__($good->name)}}</td>
                <td>{{__($good->rate)}}</td>
                <td>{{__($good->quantity)}}</td>
                <td><img width="200" height="100" src="{{__($good->image)}}"/></td>
                <td>
                    @can('delete-user')
                        <form id="delete-form-{{$good->id}}" method="post" action="{{route('goods.destroy',$good)}}">
                            @method('delete')
                            {{csrf_field()}}
                            <span  onclick="document.getElementById('delete-form-{{$good->id}}').submit()" class="navbar-text"><i class="fa fa-trash"></i></span>
                        </form>
                    @endcan
                </td>

            </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    {{$goods->links()}}
@endsection

