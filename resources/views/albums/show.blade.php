@extends('layouts/base')

@section('title', 'Home')

<?php /*
    <form method="POST" action="/bands/save/{{$band->id}}">
 */ ?>

@section('content')

    {!! Form::model($album, ['method' => 'GET' ] ) !!}
    
    @include ('albums.partials.form')

    {!! Form::close() !!}

@stop
