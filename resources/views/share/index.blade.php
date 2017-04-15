@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    
                    @if (count($shares))
                    
                        @foreach ($shares as $share)

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">{{ $share->name }}</div>
                                    <div class="panel-body">{{ $share->content }}</div>
                                </div>
                            </div>
                        
                        @endforeach
                        
                        <div class="col-sm-7 col-md-offset-5">
                            {{ $shares->render() }}
                        </div>

                    @else

                        <p>No feedbacks yet.</p>
                    
                    @endif

                </div>
                
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">

                    @include('share.create')

                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection
