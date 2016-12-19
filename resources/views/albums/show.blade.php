@extends('layouts/base')

@section('title', 'Home')

@section('content')

    <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{$album->name}}</dd>
    
        <dt>Band</dt>
        <dd>{{$band_name}}</dd>

        <dt>Recorded Date</dt>
        <dd>{{$album->recorded_date}}</dd>

        <dt>Release Date</dt>
        <dd>{{$album->recorded_date}}</dd>

        <dt>Number of Tracks</dt>
        <dd>{{$album->number_of_tracks}}</dd>

        <dt>Label</dt>
        <dd>{{$album->label}}</dd>

        <dt>Producer</dt>
        <dd>{{$album->producer}}</dd>

        <dt>Genre</dt>
        <dd>{{$album->genre}}</dd>
    </dl>

@stop
