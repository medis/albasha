@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @include('partials.errors')

        {!! Form::model($gallery, ['route' => ['gallery.update', $gallery], 'files' => true, 'method' => 'put']) !!}

            <div class="row">

                <div class="col-sm-6">
                  <div class="thumbnail">
                    {{ Html::image($gallery->thumbnail) }}
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group name">
                        {{ Form::label('file', 'Upload new image') }}
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
                        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>

@endsection
