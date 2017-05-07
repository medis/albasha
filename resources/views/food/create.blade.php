@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @include('partials.errors')

        {!! Form::open(['route' => 'food.store', 'files' => true]) !!}

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group title">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title') }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group image">
                        {{ Form::label('file', 'Image') }}
                        {{ Form::file('file') }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group price">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('price') }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group description">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description') }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group category">
                        {{ Form::label('category', 'Category') }}
                        {{ Form::select('category', $categories) }}
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
