@extends('layout.dashboard')
@section('title','Agreement List')
@section('header','Agreement List')

@section("content")

    <table>
        <tr>
            <th>Agreement Type</th>
            <th>Date Of Agreement</th>
            <th>Name of Agreement Holder</th>
            <th>Operations</th>
        </tr>
        
        @foreach($data as $agreement)

        <tr>
            <td>{{$agreement->type}}</td>
            <td>{{$agreement->date}}</td>
            <td>{{$agreement->party_name}}</td>
            <td><button>Edit</button> <button>Download</button></td>
        </tr>

        @endforeach
    </table>

@endsection
