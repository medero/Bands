@extends('layouts/base')

@section('title', 'Home')

@section('content')
    
    <a class="btn" href="/bands/create">Create a new band</a>

    <table class="table table-inverse">
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bands as $band)
            <tr>
                <td>{{$band->name}}</td>
                <td>{{$band->start_date}}</td>
                <td><a href="/bands/{{$band->id}}/edit">Edit</a></td>
                <td><a href="/bands/{{$band->id}}/delete">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
