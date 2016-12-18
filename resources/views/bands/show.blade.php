@extends('layouts/base')

@section('title', 'Home')

<?php /*
    <form method="POST" action="/bands/save/{{$band->id}}">
 */ ?>

@section('content')

    {!! Form::model($band, ['method' => 'GET' ] ) !!}
    
    @include ('bands.partials.form')

    {!! Form::close() !!}

@stop
