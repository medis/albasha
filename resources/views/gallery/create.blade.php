@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @include('partials.errors')

        {!! Form::open(['route' => 'gallery.store', 'files' => true]) !!}

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group name">
                        {{ Form::label('file', 'Image') }}
                        {{ Form::file('file') }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group notes">
                        {{ Form::label('slideshow', 'Visible in slideshow') }}
                        {{ Form::checkbox('slideshow') }}
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group submit">
                        {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>

@endsection
