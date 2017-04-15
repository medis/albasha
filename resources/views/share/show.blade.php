@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                        
                      <div class="col-sm-12 col-md-6 col-lg-4">
                          <div class="panel panel-default">
                              <div class="panel-heading">{{ $share->name }}</div>
                              <div class="panel-body">{{ $share->content }}</div>
                          </div>
                      </div>

                </div>
                
            </div>
            
        </div>
    </div>

</div>
@endsection
