@extends('layouts/base')

@section('title', 'Home')

@section('content')
    <h3>Add a new band</h3>
    <form method="POST" action="/bands">

        @include('bands.partials.form')

    </form>
@stop
