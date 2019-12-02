@extends('layouts.app')
@section('content')
    <div class="container hero">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">The Revolution is Here.</h1>
{{--                <div class="embed-responsive">--}}
                    @php
                        $goods = \App\Good::orderBy('created_at','desc')->get();
                    @endphp
                    @if(isset($goods))
                        <div class="row">
                        @foreach($goods as $good)

                            <div class="col-md-4">
                                <div class="card bg-dark">
                                    <div class="card-body">
                                        <img src="{{$good->image}}" class="embed-responsive">
                                        <h4 class="navbar-text">{{$good->name}}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <br/>
    <br/>
@endsection