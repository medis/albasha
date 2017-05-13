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

                @if (count($data))

                    @foreach ($data as $category => $foods)

                      <p class="text-uppercase">{{ $category }}</p>


                        <food-list category="{{ $category }}"></food-list>
                      

                    @endforeach

                @else

                    <p>No food yet.</p>

                @endif

            </div>
              
          </div>

      </div>
    </div>
  </div>
@endsection