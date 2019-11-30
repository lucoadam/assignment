

@extends('layouts.app')
@section('content')
    <h1>Dashboard</h1>
    @can('admin')
        <li class="nav-item">
            Administrator Account
        </li>
    @elsecan('author')
        <li class="nav-item">
            Author Account
        </li>
    @else
        <li class="nav-item">
            Registered Account
        </li>
    @endcan
    <br/>
    <br/>
@endsection

