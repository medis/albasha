@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
          <div class="btn-group" role="group" aria-label="...">
            <a href="{{ route('gallery.create') }}" class="btn btn-default">Add image</a>
          </div>
        </div>

        <div class="panel panel-default">

            <div class="panel-body">

                @if (count($gallery))
                    
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Thumbnail</th>
                          <th>Created</th>
                          <th>Showing in slideshow</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                      @foreach ($gallery as $image)

                        <tr>
                          <td>{{ Html::image($image->thumbnail) }}</td>
                          <td>{{ $image->created_at->toDayDateTimeString() }}
                          <td>{{ $image->slideshow ? '&#10003;' : '&#x2718;' }}</td>
                          <td>
                            <ul>
                              <li><a href="{{ route('gallery.edit', $image) }}">Edit</a></li>
                              <li><a href="{{ route('gallery.destroy', $image) }}" class="delete" data-confirm="Are you sure you want to delete this?">Delete</a></li>
                            </ul>
                          </td>
                        </tr>
                      
                      @endforeach

                      </tbody>
                    </table>

                    <div class="col-sm-7 col-md-offset-5">
                        {{ $gallery->render() }}
                    </div>

                @else

                    <p>No feedbacks yet.</p>
                
                @endif

            </div>
              
          </div>

      </div>
    </div>
  </div>
@endsection