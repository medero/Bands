        {{ csrf_field() }}

        @include ('errors.list')

        <div class="form-group row">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('band_id', 'Bands:') !!}
            {{ Form::select('band_id', $bands, null, $options) }}
        </div>
        <div class="form-group row">
            {!! Form::label('recorded_date', 'Recorded Date:') !!}
            {!! Form::input('date', 'recorded_date', null, ['type' => 'date', 'class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('release_date', 'Release Date:') !!}
            {!! Form::input('date', 'release_date', date('Y-m-d'), ['type' => 'date', 'class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('number_of_tracks', 'Number of Tracks:') !!}
            {!! Form::text('number_of_tracks', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('label', 'Label:') !!}
            {!! Form::text('label', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('producer', 'Producer:') !!}
            {!! Form::text('producer', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('genre', 'Genre:') !!}
            {!! Form::text('genre', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
              <button type="submit" class="btn btn-primary">Submit</button>
        </div>

