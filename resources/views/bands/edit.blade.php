@extends('layouts/base')

@section('title', 'Home')

@section('content')
    <form method="POST" action="/bands/save/{{$band->id}}">
        <div class="form-group row">
            <label for="name" class="col-xs-2 col-form-label">Name</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" name="name" value="{{ $band->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-xs-2 col-form-label">Start Date:</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" name="name" value="{{ $band->start_date}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-xs-2 col-form-label">Website:</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" name="name" value="{{ $band->website}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-xs-2 col-form-label">Active:</label>
            <div class="col-xs-10">
                {{ Form::checkbox('still_active', '1', $band->still_active ) }}
            </div>
        </div>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@stop
