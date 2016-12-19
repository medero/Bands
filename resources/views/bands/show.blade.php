@extends('layouts/base')

@section('title', 'Home')

@section('content')

    <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{{$band->name}}</dd>
    
        <dt>Start Date</dt>
        <dd>{{$band->start_date}}</dd>

        <dt>Website</dt>
        <dd>{{$band->website}}</dd>

        <dt>Active?</dt>
        <dd>@if($band->still_active)
            Yes
        @else
            No
        @endif</dd>

    </dl>

@stop
