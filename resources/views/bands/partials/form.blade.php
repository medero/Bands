        {{ csrf_field() }}

        @include ('errors.list')

        <div class="form-group row">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('start_date', 'Start Date:') !!}
            {!! Form::input('date', 'start_date', null, ['type' => 'date', 'class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('website', 'Website:') !!}
            {!! Form::text('website', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group row">
            {!! Form::label('still_active', 'Active:') !!}
            {{ Form::checkbox('still_active', '1') }}
        </div>
        <div class="form-group row">
              <button type="submit" class="btn btn-primary">Submit</button>
        </div>

