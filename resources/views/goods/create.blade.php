
@extends('layouts.app')
@section('content')
    <div class="offset-3 col-md-6">
        <h1 class="text-center">Add Goods</h1>
        <form class="bg-dark" method="post" action="{{route('goods.store')}}" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
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
                <label for="input-name">Goods Name</label>
                <input class="form-control" type="text" id="input-name" name="name"/>
                <span id="input-name-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
            <div class="form-group text-white-50">
                <label for="input-image">Image</label>
                <input class="form-control" type="file" id="input-image" name="image"/>
                <span id="input-image-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
            <div class="form-group text-white-50">
                <label for="input-quantity">Quantity</label>
                <input class="form-control" type="number" id="input-quantity" name="qunatity"/>
                <span id="input-quantity-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
            </div>
                <div class="form-group text-white-50">
                    <label for="input-rate">Rate</label>
                    <input class="form-control" type="number" id="input-rate" name="rate"/>
                    <span id="input-rate-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
                </div>
                <div class="form-group text-white-50">
                    <label for="input-description">Description</label>
                    <textarea class="form-control" id="input-description" name="description">

                    </textarea>
                    <span id="input-description-error" class="text-danger d-none"><strong>Alert</strong> text.</span>
                </div>
            <div class="form-group">
                <div class="btn-group" role="group">
                    <button class="btn btn-primary mr-10" type="submit">Add</button>
                </div>
            </div>
        </form>
    </div>
@endsection

