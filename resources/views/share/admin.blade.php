@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    
                    @if (count($shares))
                        
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Created</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>

                          @foreach ($shares as $share)

                            <tr>
                              <td>{{ $share->name }}</td>
                              <td>{{ $share->created_at->toDayDateTimeString() }}
                              <td>{{ $share->confirmed ? '&#10003;' : '&#x2718;' }}</td>
                              <td>
                                <ul>
                                  <li><a href="{{ route('share.show', $share) }}">View</a></li>
                                  <li><a href="{{ route('share.edit', $share) }}">Edit</a></li>
                                  <li><a href="{{ route('share.destroy', $share) }}" data-confirm="Are you sure you want to delete this?" class="delete">Delete</a></li>
                                </ul>
                              </td>
                            </tr>
                          
                          @endforeach

                          </tbody>
                        </table>
                        
                        <div class="col-sm-7 col-md-offset-5">
                            {{ $shares->render() }}
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
