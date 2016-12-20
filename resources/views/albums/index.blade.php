@extends('layouts/base')

@section('title', 'Home')

@section('content')


    <div class="row clearfix">
        <div class="pull-right">
            <a class="btn btn-primary" href="/albums/create">Create a new album</a>
        </div>
        <form class="form" action="/albums">
            <div class="form-group row">
                {{ Form::select('band_id', $bands, $band_id, $options) }}
                <button class="btn">Filter</button>
            </div>
        </form>
    </div>

    <table class="table table-inverse">
        <thead>
            <tr>
                <th>Name</th>
                <th>Band</th>
                <th>Label</th>
                <th>Producer</th>
                <th>Genre</th>
                <th>Recorded Date</th>
                <th>Date Created</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td><a href="/albums/{{$album->id}}">{{$album->name}}</a></td>
                <td>{{$album->band()->first()->name}}</td>
                <td>{{$album->label}}</td>
                <td>{{$album->producer}}</td>
                <td>{{$album->genre}}</td>
                <td>{{$album->recorded_date}}</td>
                <td>{{$album->created_at}}</td>
                <td><a href="/albums/{{$album->id}}/edit">Edit</a></td>
                <td>
                    <form action="{{route('albums.destroy', [$album->id])}}" method="POST">
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
