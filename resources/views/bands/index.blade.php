@extends('layouts/base')

@section('title', 'Home')

@section('content')
    
    <div class="row clearfix">
        <div class="pull-right">
            <a class="btn btn-primary" href="/bands/create">Create a new band</a>
        </div>
    </div>

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
                <td>
                    <form action="{{route('bands.destroy', [$band->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
