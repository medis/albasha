@extends('layouts.app')

@section('content')
<div class="container page-share">

    <h1>Share a message with us</h1>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (count($shares))
            
                <div class="row">

                @foreach ($shares as $share)

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $share->name }}</div>
                            <div class="panel-body">{{ $share->content }}</div>
                        </div>
                    </div>
                
                @endforeach

                </div>

                <div class="col-sm-7 col-md-offset-5">
                    {{ $shares->render() }}
                </div>

            @else

                <p>No feedbacks yet.</p>
            
            @endif


            @include('share.create')

        </div>
    </div>

</div>
@endsection
