@extends('layouts/base')

@section('title', 'Home')

@section('content')
    <table class="table table-inverse">
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bands as $band)
            <tr>
                <td>{{$band->name}}</td>
                <td><a href="/bands/edit/{{$band->id}}">Edit</a></td>
                <td><a href="/bands/delete/{{$band->id}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
