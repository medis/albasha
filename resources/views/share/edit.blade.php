@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    
                  @include('partials.errors')

                  {!! Form::model($share, ['route' => ['share.update', $share], 'method' => 'put']) !!}

                      <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group name">
                                  {{ Form::label('name', 'Name', ['class' => 'accessible-hidden']) }}
                                  {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required' => true]) }}
                              </div>
                          </div>

                      </div>

                      <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group notes">
                                  {{ Form::label('confirmed', 'Confirmed') }}
                                  {{ Form::checkbox('confirmed') }}
                              </div>
                          </div>

                      </div>

                      <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group notes">
                                  {{ Form::label('content', 'Text', ['class' => 'accessible-hidden']) }}
                                  {{ Form::textarea('content', null, ['placeholder' => 'Please leave a message...', 'class' => 'form-control', 'required' => true]) }}
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
    </div>

</div>
@endsection
