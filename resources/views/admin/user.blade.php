@extends('layout.dashboard')
@section('title','Users')

@section('header', 'Users Management')


@section('content')

@if(Session::has('msg'))
    <p>{{Session::get('msg')}}</p>
@endif
    <h1>Users Section</h1>

    <table>
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td><button value="{{$user->id}}" onclick="document.location.href=`{{ route('admin.user.edit', $user->id) }}`">Edit Details</button> <button value="{{$user->id}}">Block User</button></td>
        </tr>
        @endforeach
    </table>
@endsection

