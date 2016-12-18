@extends('layouts/base')

@section('title', 'Home')

@section('content')
    <h3>Add a new album</h3>
    <form method="POST" action="/albums">

        @include('albums.partials.form')

    </form>
@stop
