@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        @include('partials.errors')

        {!! Form::model($food, ['route' => ['food.update', $food], 'files' => true, 'method' => 'put']) !!}

            <div class="row">

                <div class="col-sm-6">
                  <div class="thumbnail">
                    {{ Html::image($food->thumbnail) }}
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
                    <div class="form-group title">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title') }}
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
                        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>

@endsection
