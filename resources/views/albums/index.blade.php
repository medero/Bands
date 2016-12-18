@extends('layouts/base')

@section('title', 'Home')

@section('content')
    <table class="table table-inverse">
        <thead>
            <tr>
                <th>Name</th>
                <th>Band</th>
                <th>Label</th>
                <th>Genre</th>
                <th>Recorded Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td>{{$album->name}}</td>
                <td>{{$album->band()->first()->name}}</td>
                <td>{{$album->label}}</td>
                <td>{{$album->genre}}</td>
                <td>{{$album->recorded_date}}</td>
                <td><a href="/bands/edit/{{$album->id}}">Edit</a></td>
                <td><a href="/bands/delete/{{$album->id}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
