@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
          <div class="btn-group" role="group" aria-label="...">
            <a href="{{ route('food.create') }}" class="btn btn-default">Add food</a>
          </div>
        </div>

        <div class="panel panel-default">

            <div class="panel-body">

                <div class="col-cm-12" v-show="showSaveOrder">
                  <div class="alert alert-success">
                    Don't forget to save changes!
                  </div>
                </div>

                @if (count($data))

                    @foreach ($data as $category => $foods)

                      <p class="text-uppercase">{{ $category }}</p>

                      <food-list category="{{ $category }}"></food-list>

                    @endforeach

                    {!! Form::open(['route' => 'api_food_store_weight']) !!}

                      <div class="row save-order" v-show="showSaveOrder">
                          <div class="col-sm-12">
                              <div class="form-group submit">
                                  {{ Form::submit('Save order', ['class' => 'btn btn-primary', 'v-on:click.stop.prevent' => 'reorder', ':disabled' => 'isSendingOrder']) }}
                              </div>
                          </div>
                      </div>
                    {!! Form::close() !!}

                @else

                    <p>No food yet.</p>

                @endif

            </div>
              
          </div>

      </div>
    </div>
  </div>
@endsection