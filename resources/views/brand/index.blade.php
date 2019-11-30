
@extends('layouts.app')
@section('content')
    <h1 class="text-center">Brands</h1>
    <div class="d-flex justify-content-end">
        @canany(['registered','admin'])
        <div class="h-100">
           <a href="{{route('brand.create')}}" title="Add Brand">
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
                <th>Brand</th>
                @can('admin')
                <th>Action</th>
                    @endcan
            </tr>
            </thead>
            <tbody>
            @if(isset($brands)&&!is_null($brands))
                @foreach($brands as $brand)
            <tr>
                <td>{{__($brand->id)}}</td>
                <td>{{__($brand->name)}}</td>
                @can('admin')
                <td>

                        <form id="delete-form-{{$brand->id}}" method="post" action="{{route('brand.destroy',$brand)}}">
                            @method('delete')
                            {{csrf_field()}}
                            <a href="{{route('brand.edit',$brand)}}"><span  class="navbar-text"><i class="fa fa-edit"></i></span></a>
                            <span  onclick="document.getElementById('delete-form-{{$brand->id}}').submit()" class="navbar-text"><i class="fa fa-trash"></i></span>
                        </form>

                </td>
                @endcan

            </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    {{$brands->links()}}
@endsection

